<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Seller;

interface SellerRepositoryInterface
{
    public function findAll(): Sellers;
}