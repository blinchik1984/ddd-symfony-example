<?php

declare(strict_types=1);

namespace App\Core;

abstract class AbstractSimpleBooleanValueObject
{
    private bool $value;

    public function __construct(bool $rawValue)
    {
        $this->preConditionValidation($rawValue);
        $this->value = $rawValue;
    }

    public function getValue(): bool
    {
        return $this->value;
    }

    protected function preConditionValidation(bool $rawValue): void
    {
    }
}