<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\Producer\Persistence\Postgres;

use App\Group\Domain\Model\Producer\Name;
use App\Group\Domain\Model\Producer\Producer;
use App\Group\Domain\Model\Producer\ProducerRepositoryInterface;

final class ProducerRepository implements ProducerRepositoryInterface
{
    public function findByName(Name $name): ?Producer
    {
        // TODO: Implement findByName() method.
    }
}