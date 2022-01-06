<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\Producer;

use App\Group\Domain\Exception\AbstractException;

final class NameEmptyValueException extends AbstractException
{
    public static function create(): self
    {
        return new self('Producer name can not be empty');
    }
}