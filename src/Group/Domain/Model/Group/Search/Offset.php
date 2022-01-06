<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group\Search;

use App\Core\AbstractSimpleIntValueObject;
use App\Group\Domain\Exception\Group\Search\OffsetInvalidValueException;

final class Offset extends AbstractSimpleIntValueObject
{
    private const MIN = 1;

    /**
     * @throws OffsetInvalidValueException
     */
    protected function preConditionValidation(int $rawValue): void
    {
        if ($rawValue < self::MIN) {
            throw OffsetInvalidValueException::create($rawValue, self::MIN);
        }
    }
}