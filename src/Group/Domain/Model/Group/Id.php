<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Core\AbstractSimpleIntValueObject;
use App\Group\Domain\Exception\Group\IdInvalidValueException;

final class Id extends AbstractSimpleIntValueObject
{
    private const MIN = 0;

    /**
     * @throws IdInvalidValueException
     */
    protected function preConditionValidation(int $rawValue): void
    {
        if ($rawValue < self::MIN) {
            throw IdInvalidValueException::create($rawValue, self::MIN);
        }
    }
}