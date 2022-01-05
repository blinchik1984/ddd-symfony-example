<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\Category;

use App\Group\Domain\Model\Category\Category;
use App\Group\Domain\Model\Category\Id;
use App\Group\Domain\Model\Category\Name;

final class CategoryCacheSerializer
{
    public function encode(?Category $category): ?array
    {
        if (null === $category) {
            return null;
        }

        return [
            'id' => $category->getId()->getValue(),
            'name' => $category->getName()->getValue(),
        ];
    }

    public function decode(?array $rawCategory): ?Category
    {
        if (null === $rawCategory) {
            return null;
        }

        return new Category(
            new Id($rawCategory['id'] ?? 0),
            new Name($rawCategory['name'] ?? ''),
        );
    }
}