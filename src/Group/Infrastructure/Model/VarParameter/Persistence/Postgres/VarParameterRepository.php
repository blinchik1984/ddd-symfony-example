<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\VarParameter\Persistence\Postgres;

use App\Group\Domain\Model\VarParameter\Ids;
use App\Group\Domain\Model\VarParameter\Name;
use App\Group\Domain\Model\VarParameter\VarParameter;
use App\Group\Domain\Model\VarParameter\VarParameterRepositoryInterface;
use App\Group\Domain\Model\VarParameter\VarParameters;

final class VarParameterRepository implements VarParameterRepositoryInterface
{
    public function findByIds(Ids $ids): VarParameters
    {
        // TODO: Implement findByIds() method.
    }

    public function findByName(Name $name): ?VarParameter
    {
        // TODO: Implement findByName() method.
    }
}