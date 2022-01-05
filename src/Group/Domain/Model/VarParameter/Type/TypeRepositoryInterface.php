<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\VarParameter\Type;

interface TypeRepositoryInterface
{
    public function findAll(): Types;
}