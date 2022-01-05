<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Seller\Segment;

use App\Core\AbstractCollection;

/**
 * @method Segment current()
 */
final class Segments extends AbstractCollection
{
    public function add(Segment $segment): void
    {
        $this->items[$segment->getId()->getValue()] = $segment;
    }
}