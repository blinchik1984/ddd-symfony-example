<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group\Search\Order;

final class Order
{
    private Name $name;
    private Type $type;

    public function __construct(
        Name $name,
        Type $type
    ) {
        $this->name = $name;
        $this->type = $type;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getType(): Type
    {
        return $this->type;
    }
}