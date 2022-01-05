<?php

declare(strict_types=1);

namespace App\Group\Application\Factory\VarParameter;

use App\Group\Domain\Model\VarParameter\Id;
use App\Group\Domain\Model\VarParameter\Ids;

class IdFactory
{
    public function buildCollection(array $rawIds): Ids
    {
        $ids = new Ids();

        foreach ($rawIds as $rawId) {
            $ids->add(new Id($rawId));
        }

        return $ids;
    }
}