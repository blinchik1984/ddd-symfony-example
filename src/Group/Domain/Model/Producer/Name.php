<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Producer;

use App\Core\AbstractSimpleStringValueObject;
use App\Group\Domain\Exception\Producer\NameEmptyValueException;

final class Name extends AbstractSimpleStringValueObject
{
    /**
     * @throws NameEmptyValueException
     */
    protected function preConditionValidation(string $rawValue): void
    {
        if (empty($rawValue)) {
            throw NameEmptyValueException::create();
        }
    }
}