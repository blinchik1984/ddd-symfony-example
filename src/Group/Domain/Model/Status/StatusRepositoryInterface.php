<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Status;

interface StatusRepositoryInterface
{
    public function findAll(): Statuses;
    public function findByIds(Ids $ids): Statuses;
    public function findByName(Name $name): ?Status;
}