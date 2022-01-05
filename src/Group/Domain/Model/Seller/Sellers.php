<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Seller;

use App\Core\AbstractCollection;

final class Sellers extends AbstractCollection
{
    public function add(Seller $seller): void
    {
        $this->items[$seller->getId()->getValue()] = $seller;
    }
}