<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\Category;

use App\Group\Domain\Model\Category\Categories;
use App\Group\Domain\Model\Category\Category;
use App\Group\Domain\Model\Category\Id;
use App\Group\Domain\Model\Category\Name;

final class CategoryFactory
{
    public function build(array $rawCategory): Category
    {
        return new Category(
            new Id($rawCategory['id'] ?? 0),
            new Name($rawCategory['name'] ?? ''),
        );
    }

    public function buildCollection(array $rawCategories): Categories
    {
        $categories = new Categories();

        foreach ($rawCategories as $rawCategory) {
            $categories->add($this->build($rawCategory));
        }

        return $categories;
    }
}