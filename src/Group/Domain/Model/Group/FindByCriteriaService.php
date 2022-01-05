<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Group\Domain\Model\Category\CategoryRepositoryInterface;
use App\Group\Domain\Model\Group\Search\Criteria;
use App\Group\Domain\Model\Group\Search\Filters;
use App\Group\Domain\Model\Producer\ProducerRepositoryInterface;
use App\Group\Domain\Model\Status\StatusRepositoryInterface;
use App\Group\Domain\Model\VarParameter\VarParameterRepositoryInterface;

final class FindByCriteriaService
{
    private GroupRepositoryInterface $groupRepository;
    private ProducerRepositoryInterface $producerRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private StatusRepositoryInterface $statusRepository;
    private VarParameterRepositoryInterface $varParameterRepository;

    public function __construct(
        GroupRepositoryInterface $groupRepository,
        ProducerRepositoryInterface $producerRepository,
        CategoryRepositoryInterface $categoryRepository,
        StatusRepositoryInterface $statusRepository,
        VarParameterRepositoryInterface $varParameterRepository
    ) {
        $this->groupRepository = $groupRepository;
        $this->producerRepository = $producerRepository;
        $this->categoryRepository = $categoryRepository;
        $this->statusRepository = $statusRepository;
        $this->varParameterRepository = $varParameterRepository;
    }

    public function execute(FindByCriteriaRequest $request): Groups
    {
        $categoryId = null;

        if (null !== $request->getCategoryId()) {
            $categoryId = $request->getCategoryId();
        } elseif (null !== $request->getCategoryName()) {
            $category = $this->categoryRepository->findByName($request->getCategoryName());
            if (null === $category) {
                return new Groups();
            }

            $categoryId = $category->getId();
        }

        $producerId = null;

        if (null !== $request->getProducerId()) {
            $producerId = $request->getProducerId();
        } elseif (null !== $request->getProducerName()) {
            $producer = $this->producerRepository->findByName($request->getProducerName());
            if (null === $producer) {
                return new Groups();
            }

            $producerId = $producer->getId();
        }

        $varParameterId = null;

        if (null !== $request->getVarParameterId()) {
            $varParameterId = $request->getVarParameterId();
        } elseif (null !== $request->getVarParameterName()) {
            $varParameter = $this->varParameterRepository->findByName($request->getVarParameterName());

            if (null === $varParameter) {
                return new Groups();
            }

            $varParameterId = $varParameter->getId();
        }

        if (null === $request->getStatusIds()) {
            $statuses = $this->statusRepository->findAll();
        } else {
            $statuses = $this->statusRepository->findByIds($request->getStatusIds());
        }

        return $this->groupRepository->findByCriteria(
            new Criteria(
                new Filters(
                    $request->getName(),
                    $request->getId(),
                    $categoryId,
                    $producerId,
                    $request->getSellerSegmentId(),
                    $varParameterId,
                    $statuses,
                ),
                $request->getOrders(),
                $request->getLimit(),
                $request->getOffset(),
            ),
        );
    }
}