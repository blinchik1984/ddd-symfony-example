<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception\Category;

use App\Group\Domain\Exception\AbstractException;

final class NameEmptyValueException extends AbstractException
{
    public static function create(string $name): self
    {
        $exception = new self('Group name can not be empty');
        $exception->setContext(['name' => $name]);

        return $exception;
    }
}