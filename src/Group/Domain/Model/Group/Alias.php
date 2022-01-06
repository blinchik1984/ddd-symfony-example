<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Core\AbstractSimpleStringValueObject;
use App\Group\Domain\Exception\Group\AliasEmptyValueException;

final class Alias extends AbstractSimpleStringValueObject
{
    /**
     * @throws AliasEmptyValueException
     */
    protected function preConditionValidation(string $rawValue): void
    {
        if (empty($rawValue)) {
            throw AliasEmptyValueException::create();
        }
    }
}