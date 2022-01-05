<?php

declare(strict_types=1);

namespace App\Group\Domain\Exception;

use App\Core\Exception\AbstractPackageException;

abstract class AbstractException extends AbstractPackageException
{
    protected function getPackageName(): string
    {
        return 'Group';
    }
}