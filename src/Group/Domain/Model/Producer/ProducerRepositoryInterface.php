<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Producer;

interface ProducerRepositoryInterface
{
    public function findByName(Name $name): ?Producer;
}