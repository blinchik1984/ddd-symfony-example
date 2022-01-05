<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\Status\Persistence\Memory;

use App\Group\Domain\Model\Status\Ids;
use App\Group\Domain\Model\Status\Name;
use App\Group\Domain\Model\Status\Status;
use App\Group\Domain\Model\Status\Statuses;
use App\Group\Domain\Model\Status\StatusRepositoryInterface;
use App\Group\Infrastructure\Model\Status\StatusFactory;

final class StatusRepository implements StatusRepositoryInterface
{
    private const STATUSES = [
        1 => 'Active',
        2 => 'Not Active'
    ];
    private StatusFactory $statusFactory;

    public function __construct(
        StatusFactory $statusFactory
    ) {
        $this->statusFactory = $statusFactory;
    }

    public function findAll(): Statuses
    {
        return $this->statusFactory->buildCollection(self::STATUSES);
    }
    
    public function findByIds(Ids $ids): Statuses
    {
        $statuses = new Statuses();

        foreach ($ids as $id) {
            if (isset(self::STATUSES[$id->getValue()])) {
                $statuses->add(
                    new Status($id, new Name(self::STATUSES[$id->getValue()])),
                );
            }
        }

        return $statuses;
    }

    public function findByName(Name $name): ?Status
    {
        // TODO: Implement findByName() method.
    }
}