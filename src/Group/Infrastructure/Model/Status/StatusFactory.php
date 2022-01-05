<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\Status;

use App\Group\Domain\Model\Status\Id;
use App\Group\Domain\Model\Status\Name;
use App\Group\Domain\Model\Status\Status;
use App\Group\Domain\Model\Status\Statuses;

final class StatusFactory
{
    public function build(int $rawId, string $rawName): Status
    {
        return new Status(
            new Id($rawId),
            new Name($rawName),
        );
    }

    public function buildCollection(array $rawStatuses): Statuses
    {
        $statuses = new Statuses();

        foreach ($rawStatuses as $rawId => $rawName) {
            $statuses->add($this->build($rawId,  $rawName));
        }

        return $statuses;
    }
}