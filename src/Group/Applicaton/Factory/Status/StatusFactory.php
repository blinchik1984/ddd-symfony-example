<?php

declare(strict_types=1);

namespace App\Group\Application\Factory\Status;

use App\Group\Domain\Model\Status\Id;
use App\Group\Domain\Model\Status\Name;
use App\Group\Domain\Model\Status\Status;

final class StatusFactory
{
    public function build(array $rawStatus): Status
    {
        return new Status(
            new Id($rawStatus['id'] ?? 0),
            new Name($rawStatus['name'] ?? ''),
        );
    }
}