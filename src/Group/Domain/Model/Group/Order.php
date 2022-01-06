<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Core\AbstractSimpleIntValueObject;
use App\Group\Domain\Exception\Group\OrderInvalidValueException;

final class Order extends AbstractSimpleIntValueObject
{
    private const MIN = 0;

    /**
     * @throws OrderInvalidValueException
     */
    protected function preConditionValidation(int $rawValue): void
    {
        if ($rawValue < self::MIN) {
            throw OrderInvalidValueException::create($rawValue, self::MIN);
        }
    }
}