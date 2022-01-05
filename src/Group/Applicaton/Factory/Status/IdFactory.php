<?php

declare(strict_types=1);

namespace App\Group\Application\Factory\Status;

use App\Group\Domain\Model\Status\Id;
use App\Group\Domain\Model\Status\Ids;

final class IdFactory
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