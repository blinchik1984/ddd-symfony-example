<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Status;

use App\Core\AbstractCollection;

/**
 * @method Status current()
 */
final class Statuses extends AbstractCollection
{
    public function add(Status $status): void
    {
        $this->items[$status->getId()->getValue()] = $status;
    }
}