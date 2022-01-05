<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Category;

use App\Core\AbstractCollection;

/**
 * @method Category current()
 */
final class Categories extends AbstractCollection
{
    public function add(Category $category): void
    {
        $this->items[$category->getId()->getValue()] = $category;
    }
}