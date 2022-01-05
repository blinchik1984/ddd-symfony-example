<?php

declare(strict_types=1);

namespace App\Core;

abstract class AbstractSimpleIntValueObject
{
    private int $value;

    public function __construct(int $rawValue)
    {
        $this->preConditionValidation($rawValue);
        $this->value = $rawValue;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    protected function preConditionValidation(int $rawValue): void
    {
    }
}