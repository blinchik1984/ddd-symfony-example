<?php

declare(strict_types=1);

namespace App\Group\Application\Transformer\Group;

use App\Group\Domain\Model\Group\Groups;

final class GroupsToArray
{
    private GroupToArray $groupToArray;

    public function __construct(
        GroupToArray $groupToArray
    ) {
        $this->groupToArray = $groupToArray;
    }

    public function transform(Groups $groups): array
    {
        $transformed = [];

        foreach ($groups as $group) {
            $transformed[] = $this->groupToArray->transform($group);
        }

        return $transformed;
    }
}