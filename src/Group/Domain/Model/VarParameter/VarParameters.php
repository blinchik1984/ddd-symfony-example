<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\VarParameter;

use App\Core\AbstractCollection;

/**
 * @method VarParameter current()
 */
final class VarParameters extends AbstractCollection
{
    public function add(VarParameter $varParameter): void
    {
        $this->items[$varParameter->getId()->getValue()] = $varParameter;
    }
}