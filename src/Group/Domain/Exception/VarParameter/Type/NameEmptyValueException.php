<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\VarParameter\Type;

use App\Group\Domain\Exception\AbstractException;

final class NameEmptyValueException extends AbstractException
{
    public static function create(): self
    {
        return new self('Type name of var parameter can not be empty');
    }
}