<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Seller\Segment;

use App\Core\AbstractSimpleStringValueObject;
use App\Group\Domain\Exception\Seller\Segment\NameEmptyValueException;

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