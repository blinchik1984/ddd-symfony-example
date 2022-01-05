<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group\Search\Order;

use App\Core\AbstractSimpleStringValueObject;

final class Type extends AbstractSimpleStringValueObject
{
    private const ASC = 'asc';
    private const DESC = 'desc';

    public function isAsc(): bool
    {
        return self::ASC === $this->getValue();
    }

    public function isDesc(): bool
    {
        return self::DESC === $this->getValue();
    }
}