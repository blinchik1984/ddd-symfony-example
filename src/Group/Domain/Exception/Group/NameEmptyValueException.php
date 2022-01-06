<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\Group;

use App\Group\Domain\Exception\AbstractException;

final class NameEmptyValueException extends AbstractException
{
    public static function create(): self
    {
        return new self('Group name can not be empty');
    }
}