<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\Group;

use App\Group\Domain\Exception\AbstractException;

final class OrderInvalidValueException extends AbstractException
{
    public static function create(int $order, int $minValue): self
    {
        $exception = new self('Group order is invalid');
        $exception->setContext(['order' => $order, 'min' => $minValue]);

        return $exception;
    }
}