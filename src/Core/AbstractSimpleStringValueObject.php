<?php

declare(strict_types=1);

namespace App\Core;

abstract class AbstractSimpleStringValueObject
{
    private string $value;

    public function __construct(string $rawValue)
    {
        $this->preConditionValidation($rawValue);
        $this->value = $rawValue;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    protected function preConditionValidation(string $rawValue): void
    {
    }
}