<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\Group\Search;

use App\Group\Domain\Exception\AbstractException;

final class LimitInvalidValueException extends AbstractException
{
    public static function create(int $limit, int $minValue): self
    {
        $exception = new self('Group search limit is invalid');
        $exception->setContext(['limit' => $limit, 'min' => $minValue]);

        return $exception;
    }
}