<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Category;

use App\Core\AbstractCollection;

use function array_keys;

/**
 * @method Id current()
 */
final class Ids extends AbstractCollection
{
    public function add(Id $id): void
    {
        $this->items[] = $id;
    }

    public function toArray(): array
    {
        return array_keys($this->items);
    }
}