<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\VarParameter;

interface VarParameterRepositoryInterface
{
    public function findByIds(Ids $ids): VarParameters;
    public function findByName(Name $name): ?VarParameter;
}