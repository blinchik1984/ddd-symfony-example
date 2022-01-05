<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\VarParameter\Type\Persistence\Memory;

use App\Group\Domain\Model\VarParameter\Type\TypeRepositoryInterface;
use App\Group\Domain\Model\VarParameter\Type\Types;

final class TypeRepository implements TypeRepositoryInterface
{
    public function findAll(): Types
    {
        // TODO: Implement findAll() method.
    }
}