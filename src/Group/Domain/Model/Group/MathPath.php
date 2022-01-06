<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Core\AbstractSimpleStringValueObject;
use App\Group\Domain\Exception\Group\MathPathEmptyValueException;

final class MathPath extends AbstractSimpleStringValueObject
{
    /**
     * @throws MathPathEmptyValueException
     */
    protected function preConditionValidation(string $rawValue): void
    {
        if (empty($rawValue)) {
            throw MathPathEmptyValueException::create();
        }
    }
}