<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group\Search;

use App\Core\AbstractSimpleIntValueObject;
use App\Group\Domain\Exception\Group\Search\LimitInvalidValueException;

final class Limit extends AbstractSimpleIntValueObject
{
    private const MIN = 1;

    /**
     * @throws LimitInvalidValueException
     */
    protected function preConditionValidation(int $rawValue): void
    {
        if ($rawValue < self::MIN) {
            throw LimitInvalidValueException::create($rawValue, self::MIN);
        }
    }
}