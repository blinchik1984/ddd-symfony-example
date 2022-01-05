<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Category;

interface CategoryRepositoryInterface
{
    public function findByIds(Ids $ids): Categories;
    public function findByName(Name $name): ?Category;
}