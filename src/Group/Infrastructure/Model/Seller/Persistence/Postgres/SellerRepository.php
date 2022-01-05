<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\Seller\Persistence\Postgres;

use App\Group\Domain\Model\Seller\SellerRepositoryInterface;
use App\Group\Domain\Model\Seller\Sellers;

final class SellerRepository implements SellerRepositoryInterface
{
    public function findAll(): Sellers
    {
        // TODO: Implement findAll() method.
    }
}