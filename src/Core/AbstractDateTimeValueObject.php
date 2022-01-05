<?php

declare(strict_types=1);

namespace App\Core;

use DateTimeImmutable;
use DateTimeZone;
use Throwable;

abstract class AbstractDateTimeValueObject extends DateTimeImmutable
{
    protected const FORMAT = 'Y-m-d H:i:s';

    public function __construct(string $datetime = "now", ?DateTimeZone $timezone = null)
    {
        try {
            parent::__construct($datetime, $timezone);
        } catch (Throwable $exception) {
            throw $exception;
        }
    }

    public function getValue(): string
    {
        return $this->format(self::FORMAT);
    }
}