<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group\Search;

use App\Group\Domain\Model\Group\Search\Order\Orders;

final class Criteria
{
    private Filters $filters;
    private Orders $orders;
    private Limit $limit;
    private Offset $offset;

    public function __construct(
        Filters $filters,
        Orders $orders,
        Limit $limit,
        Offset $offset
    ) {
        $this->filters = $filters;
        $this->orders = $orders;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function getFilters(): Filters
    {
        return $this->filters;
    }

    public function getOrders(): Orders
    {
        return $this->orders;
    }

    public function getLimit(): Limit
    {
        return $this->limit;
    }

    public function getOffset(): Offset
    {
        return $this->offset;
    }
}