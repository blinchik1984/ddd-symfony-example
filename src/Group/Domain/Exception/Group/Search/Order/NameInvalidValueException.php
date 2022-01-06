<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\Group\Search\Order;

use App\Group\Domain\Exception\AbstractException;

final class NameInvalidValueException extends AbstractException
{
    public static function create(string $name, array $availableList): self
    {
        $exception = new self('Group search order name is invalid');
        $exception->setContext(['name' => $name, 'availableList' => $availableList]);

        return $exception;
    }
}