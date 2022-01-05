<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Core\AbstractCollection;

use function array_keys;

final class Ids extends AbstractCollection
{
    public function add(Id $id): void
    {
        $this->items[$id->getValue()] = $id;
    }

    public function toArray(): array
    {
        return array_keys($this->items);
    }
}