<?php

declare(strict_types=1);

namespace App\Group\Application\Factory\Group\Search;

use App\Group\Domain\Model\Group\Search\Order\Name;
use App\Group\Domain\Model\Group\Search\Order\Order;
use App\Group\Domain\Model\Group\Search\Order\Orders;
use App\Group\Domain\Model\Group\Search\Order\Type;

final class OrderFactory
{
    public function build(array $rawOrder): Order
    {
        return new Order(
            new Name($rawOrder['name'] ?? ''),
            new Type($rawOrder['type'] ?? ''),
        );
    }

    public function buildCollection(array $rawOrders): Orders
    {
        $orders = new Orders();

        foreach ($rawOrders as $rawOrder) {
            $orders->add($this->build($rawOrder));
        }

        return $orders;
    }
}