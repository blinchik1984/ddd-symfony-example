<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception;

use Throwable;

final class DateTimeInvalidValueException extends AbstractException
{
    public static function create(string $dateTime, Throwable $exception): self
    {
        $exception = new self($exception->getMessage());
        $exception->setContext(['dateTime' => $dateTime, 'exception' => $exception]);

        return $exception;
    }
}