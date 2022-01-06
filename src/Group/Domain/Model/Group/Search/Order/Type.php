<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group\Search\Order;

use App\Core\AbstractSimpleStringValueObject;
use App\Group\Domain\Exception\Group\Search\Order\TypeInvalidValueException;

final class Type extends AbstractSimpleStringValueObject
{
    private const ASC = 'asc';
    private const DESC = 'desc';
    private const AVAILABLE = [
        self::ASC,
        self::DESC,
    ];

    public function isAsc(): bool
    {
        return self::ASC === $this->getValue();
    }

    public function isDesc(): bool
    {
        return self::DESC === $this->getValue();
    }

    /**
     * @throws TypeInvalidValueException
     */
    protected function preConditionValidation(string $rawValue): void
    {
        if (!in_array($rawValue, self::AVAILABLE)) {
            throw TypeInvalidValueException::create($rawValue, self::AVAILABLE);
        }
    }
}