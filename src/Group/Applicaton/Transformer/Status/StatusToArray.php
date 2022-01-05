<?php

declare(strict_types=1);

namespace App\Group\Application\Transformer\Status;

use App\Group\Domain\Model\Status\Status;

final class StatusToArray
{
    public function transform(Status $status): array
    {
        return [
            'id' => $status->getId()->getValue(),
            'name' => $status->getName()->getValue(),
        ];
    }
}