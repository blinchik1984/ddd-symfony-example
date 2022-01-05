<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Core\AbstractCollection;

/**
 * @method Group current()
 */
final class Groups extends AbstractCollection
{
    public function add(Group $group): void
    {
        $this->items[$group->getId()->getValue()] = $group;
    }

    public function getIds(): Ids
    {
        $ids = new Ids();

        foreach ($this as $group) {
            $ids->add($group->getId());
        }

        return $ids;
    }
}