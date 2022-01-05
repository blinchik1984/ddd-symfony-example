<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\Group;

use App\Group\Domain\Model\Category\Id as CategoryId;
use App\Group\Domain\Model\DateTime;
use App\Group\Domain\Model\Group\Alias;
use App\Group\Domain\Model\Group\Group;
use App\Group\Domain\Model\Group\Groups;
use App\Group\Domain\Model\Group\Id;
use App\Group\Domain\Model\Group\MathPath;
use App\Group\Domain\Model\Group\Name;
use App\Group\Domain\Model\Group\Order;
use App\Group\Domain\Model\Producer\Id as ProducerId;
use App\Group\Domain\Model\Seller\Id as SellerId;
use App\Group\Domain\Model\Status\Name as StatusName;
use App\Group\Domain\Model\Status\StatusRepositoryInterface;
use App\Group\Infrastructure\Model\VarParameter\IdFactory as VarParameterIdFactory;

final class GroupFactory
{
    private StatusRepositoryInterface $statusRepository;
    private VarParameterIdFactory $varParameterIdFactory;

    public function __construct(
        StatusRepositoryInterface $statusRepository,
        VarParameterIdFactory $varParameterIdFactory
    ) {
        $this->statusRepository = $statusRepository;
        $this->varParameterIdFactory = $varParameterIdFactory;
    }

    public function build(array $rawGroup): Group
    {
        return new Group(
            new Id($rawGroup['id'] ?? 0),
            new Name($rawGroup['name'] ?? ''),
            new Alias($rawGroup['alias'] ?? ''),
            new MathPath($rawGroup['mathPath'] ?? ''),
            new Order($rawGroup['order'] ?? 0),
            $this->statusRepository->findByName(new StatusName($rawGroup['status'] ?? '')),
            new CategoryId($rawGroup['categoryId'] ?? 0),
            new SellerId($rawGroup['sellerId'] ?? 0),
            new ProducerId($rawGroup['producerId'] ?? 0),
            $this->varParameterIdFactory->buildCollection($rawGroup['varParameterIds'] ?? 0),
            new DateTime($rawGroup['createdAt'] ?? ''),
            new DateTime($rawGroup['updatedAt'] ?? '')
        );
    }

    public function buildCollection(array $rawGroups): Groups
    {
        $groups = new Groups();

        foreach ($rawGroups as $rawGroup) {
            $groups->add($this->build($rawGroup));
        }

        return $groups;
    }
}