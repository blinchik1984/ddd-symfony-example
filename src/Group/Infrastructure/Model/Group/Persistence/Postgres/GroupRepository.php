<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\Group\Persistence\Postgres;

use App\Group\Domain\Model\Group\GroupRepositoryInterface;
use App\Group\Domain\Model\Group\Groups;
use App\Group\Domain\Model\Group\Ids;
use App\Group\Domain\Model\Group\Search\Criteria;
use App\Group\Infrastructure\Model\Group\GroupFactory;
use PDO;
use Throwable;

use function array_udiff;
use function implode;
use function is_array;

final class GroupRepository implements GroupRepositoryInterface
{
    private const TABLE_NAME = 'grouping.groups';
    private PDO $pdo;
    private GroupFactory $groupFactory;

    public function __construct(
        PDO $pdo,
        GroupFactory $groupFactory
    ) {
        $this->pdo = $pdo;
        $this->groupFactory = $groupFactory;
    }

    public function findByCriteria(Criteria $criteria): Groups
    {
        $sql = $this->getSelectSql();
        $where = [];
        $sqlData = [];
        $groupIdsBySellerSegmentId = null;
        if (null !== $criteria->getFilters()->getSellerSegmentId()) {
            $groupIdsBySellerSegmentId = $this->findGroupsBySellerSegmentId(
                $criteria->getFilters()->getSellerSegmentId(),
            );

            if (empty($groupIdsBySellerSegmentId)) {
                return new Groups();
            }
        }

        $groupIdsByProducerId = null;
        if (null !== $criteria->getFilters()->getProducerId()) {
            $groupIdsByProducerId = $this->findGroupsByProducerId(
                $criteria->getFilters()->getProducerId(),
            );

            if (empty($groupIdsByProducerId)) {
                return new Groups();
            }
        }

        $groupIdsByVarParameterId = null;
        if (null !== $criteria->getFilters()->getVarParameterId()) {
            $groupIdsByVarParameterId = $this->findGroupsByVarParameterId(
                $criteria->getFilters()->getVarParameterId(),
            );

            if (empty($groupIdsByVarParameterId)) {
                return new Groups();
            }
        }

        $searchId = $criteria->getFilters()->getId();
        $searchGroupIds = null;

        if (null !== $searchId) {
            if (is_array($groupIdsByProducerId) && !in_array($searchId, $groupIdsByProducerId)) {
                return new Groups();
            }

            if (is_array($groupIdsBySellerSegmentId) && !in_array($searchId, $groupIdsBySellerSegmentId)) {
                return new Groups();
            }

            if (is_array($groupIdsByVarParameterId) && !in_array($searchId, $groupIdsByVarParameterId)) {
                return new Groups();
            }

            $searchGroupIds = [$searchId];
        } else {
            if (is_array($groupIdsByProducerId)) {
                $searchGroupIds = $groupIdsByProducerId;
            }

            if (is_array($groupIdsBySellerSegmentId)) {
                $searchGroupIds = is_array($searchGroupIds)
                    ? array_udiff($searchGroupIds, $groupIdsBySellerSegmentId) : $groupIdsBySellerSegmentId;
            }

            if (is_array($groupIdsByVarParameterId)) {
                $searchGroupIds = is_array($searchGroupIds)
                    ? array_udiff($searchGroupIds, $groupIdsByVarParameterId) : $groupIdsByVarParameterId;
            }
        }

        if (!empty($searchGroupIds)) {
            $where[] = ' id IN (' . implode(', ', $searchGroupIds) . ')';
        }

        if (null !== $criteria->getFilters()->getName()) {
            $where[] = 'title = :title';
            $sqlData[':title'] = $criteria->getFilters()->getName()->getValue();
        }
        $statuses = $criteria->getFilters()->getStatuses();
        if (!$statuses->isEmpty()) {
            $rawStatusNames = [];
            foreach ($statuses as $status) {
                $rawStatusNames[] = "'{$status->getName()->getValue()}'";
            }
            $where[] = 'status IN (' . implode(', ', $rawStatusNames) . ')';
        }

        if (null !== $criteria->getFilters()->getCategoryId()) {
            $where[] = 'category_id = :category_id';
            $sqlData[':category_id'] = $criteria->getFilters()->getCategoryId()->getValue();
        }

        $orders = $criteria->getOrders();
        $orderCriteria = [];
        if (!$orders->isEmpty()) {
            foreach ($orders as $order) {
                if ($order->getName()->isName()) {
                    $orderCriterion = 'title ';
                } elseif ($order->getName()->isStatus()) {
                    $orderCriterion = ' status';
                } else {
                    $orderCriterion = ' ' . $order->getName()->getValue();
                }

                $orderCriteria[] = $orderCriterion . ($order->getType()->isDesc() ? 'DESC' : 'ASC');
            }
        }

        $limitSql = null !== $criteria->getLimit() ? 'LIMIT ' . $criteria->getLimit()->getValue() : '';
        $offsetSql = null !== $criteria->getOffset() ? 'OFFSET ' . $criteria->getOffset()->getValue() : '';
        $whereSql = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';
        $orderSql = !empty($orderCriteria) ? 'ORDER BY ' . implode(', ', $orderCriteria) : '';

        $statement = $this->pdo->prepare(
            "{$sql} {$whereSql} {$orderSql} {$limitSql} {$offsetSql}",
            $sqlData,
        );
        $rawGroups = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (empty($rawGroups)) {
            return new Groups();
        }

        return $this->groupFactory->buildCollection($this->prepareGroups($rawGroups));
    }

    public function findByIds(Ids $ids): Groups
    {
        if ($ids->isEmpty()) {
            return new Groups();
        }

        $sql = $this->getSelectSql() . ' WHERE id IN (' . implode(', ', $ids->toArray()) . ')';

        return $this->groupFactory->buildCollection(
            $this->prepareGroups($this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC))
        );
    }

    public function persistCollection(Groups $groups): void
    {
        $existsGroups = $this->findByIds($groups->getIds());
        $groupsToInsert = [];
        $this->pdo->exec('START TRANSACTION');

        try {
            foreach ($groups as $group) {
                if ($existsGroups->contains($group->getId())) {
                    $this->updateGroup($group);
                }
                $groupsToInsert[] = $group;
            }

            if (!empty($groupsToInsert)) {
                $this->insertGroups($groupsToInsert);
            }
            $this->pdo->exec('COMMIT');
        } catch (Throwable $exception) {
            $this->pdo->exec('ROLLBACK');
            throw $exception;
        }
    }

    private function getSelectSql(): string
    {
        return 'SELECT 
            id,
            title as name,
            category_id as categoryId,
            mpath as mathPath,
            order,
            status,
            title_parameter as alias,
            created_at as createdAt,
            updated_at as updatedAt
        FROM ' . self::TABLE_NAME;
    }

    private function prepareGroups(array $rawGroups): array
    {
        $rawGroupIds = [];

        foreach ($rawGroups as $rawGroup) {
            $rawGroupIds[] = $rawGroup['id'] ?? 0;
        }

        $rawSellerIds = $this->findSellersByGroupIds($rawGroupIds);

        foreach ($rawGroups as $key => $rawGroup) {
            if (isset($rawSellerIds[$rawGroup['id']])) {
                $rawGroups[$key]['sellerId'] = $rawSellerIds[$rawGroup['id']];
            }
        }

        $rawProducerIds = $this->findProducersByGroupIds($rawGroupIds);

        foreach ($rawGroups as $key => $rawGroup) {
            if (isset($rawProducerIds[$rawGroup['id']])) {
                $rawGroups[$key]['producerId'] = $rawProducerIds[$rawGroup['id']];
            }
        }

        $varParameterIds = $this->findVarParametersByGroupIds($rawGroupIds);

        foreach ($rawGroups as $key => $rawGroup) {
            if (isset($varParameterIds[$rawGroup['id']])) {
                $rawGroups[$key]['varParameterId'] = $varParameterIds[$rawGroup['id']];
            }
        }

        return $rawGroups;
    }
}