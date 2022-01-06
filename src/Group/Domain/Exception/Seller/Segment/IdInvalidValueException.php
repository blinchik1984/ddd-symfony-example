<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\Seller\Segment;

use App\Group\Domain\Exception\AbstractException;

final class IdInvalidValueException extends AbstractException
{
    public static function create(int $id, int $minValue): self
    {
        $exception = new self('Seller segment id is invalid');
        $exception->setContext(['id' => $id, 'min' => $minValue]);

        return $exception;
    }
}