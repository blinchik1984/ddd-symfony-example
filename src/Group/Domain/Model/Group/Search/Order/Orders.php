<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group\Search\Order;

use App\Core\AbstractCollection;

/**
 * @method Order current()
 */
final class Orders extends AbstractCollection
{
    public function add(Order $order): void
    {
        $this->items[$order->getName()->getValue()] = $order;
    }
}