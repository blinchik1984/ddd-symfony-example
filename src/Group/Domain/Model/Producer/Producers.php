<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Producer;

use App\Core\AbstractCollection;

final class Producers extends AbstractCollection
{
    public function add(Producer $producer): void
    {
        $this->items[$producer->getId()->getValue()] = $producer;
    }
}