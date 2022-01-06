<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\VarParameter\Type;

use App\Core\AbstractSimpleStringValueObject;

final class Name extends AbstractSimpleStringValueObject
{
    protected function preConditionValidation(string $rawValue): void
    {
        if (empty($rawValue)) {
            throw NameEmptyValueException::create();
        }
    }
}