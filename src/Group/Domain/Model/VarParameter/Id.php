<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\VarParameter;

use App\Core\AbstractSimpleIntValueObject;
use App\Group\Domain\Exception\VarParameter\IdInvalidValueException;

final class Id extends AbstractSimpleIntValueObject
{
    private const MIN = 1;

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