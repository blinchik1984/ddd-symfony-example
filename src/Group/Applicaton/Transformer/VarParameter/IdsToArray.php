<?php

declare(strict_types=1);

namespace App\Group\Application\Transformer\VarParameter;

use App\Group\Domain\Model\VarParameter\Ids;

class IdsToArray
{
    public function transform(Ids $ids): array
    {
        $transformed = [];

        foreach ($ids as $id) {
            $transformed[] = $id->getValue();
        }

        return $transformed;
    }
}