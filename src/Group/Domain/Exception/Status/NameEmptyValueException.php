<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\Status;

use App\Group\Domain\Exception\AbstractException;

final class NameEmptyValueException extends AbstractException
{
    public static function create(): self
    {
        return new self('Status name can not be empty');
    }
}