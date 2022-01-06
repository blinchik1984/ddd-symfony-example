<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\Group;

use App\Group\Domain\Exception\AbstractException;

final class MathPathEmptyValueException extends AbstractException
{
    public static function create(): self
    {
        return new self('Math path can not be empty');
    }
}