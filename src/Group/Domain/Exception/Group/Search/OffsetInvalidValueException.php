<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\Group\Search;

use App\Group\Domain\Exception\AbstractException;

final class OffsetInvalidValueException extends AbstractException
{
    public static function create(int $offset, int $minValue): self
    {
        $exception = new self('Group search offset is invalid');
        $exception->setContext(['offset' => $offset, 'min' => $minValue]);

        return $exception;
    }
}