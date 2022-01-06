<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\Group\Search\Order;

use App\Group\Domain\Exception\AbstractException;

final class TypeInvalidValueException extends AbstractException
{
    public static function create(string $type, array $availableList): self
    {
        $exception = new self('Group search type is invalid');
        $exception->setContext([
            'type' => $type,
            'availableList' => $availableList,
        ]);

        return $exception;
    }
}