<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\VarParameter\Type;

use App\Core\AbstractCollection;

/**
 * @method Type current()
 */
final class Types extends AbstractCollection
{
    public function add(Type $type): void
    {
        $this->items[$type->getId()->getValue()] = $type;
    }
}