<?php

declare(strict_types=1);

namespace App\Group\Application\Transformer\Group;

use App\Group\Application\Transformer\Status\StatusToArray;
use App\Group\Application\Transformer\VarParameter\IdsToArray as VarParameterIdsToArray;
use App\Group\Domain\Model\Group\Group;

final class GroupToArray
{
    private StatusToArray $statusToArray;
    private VarParameterIdsToArray $varParameterIdsToArray;

    public function __construct(
        StatusToArray $statusToArray,
        VarParameterIdsToArray $varParameterIdsToArray
    ) {
        $this->statusToArray = $statusToArray;
        $this->varParameterIdsToArray = $varParameterIdsToArray;
    }

    public function transform(Group $group): array
    {
        return [
            'id' => $group->getId()->getValue(),
            'name' => $group->getName()->getValue(),
            'mathPath' => $group->getMathPath()->getValue(),
            'order' => $group->getOrder()->getValue(),
            'status' => $this->statusToArray->transform($group->getStatus()),
            'producerId' => $group->getProducerId()->getValue(),
            'sellerId' => $group->getSellerId()->getValue(),
            'varParameterIds' => $this->varParameterIdsToArray->transform($group->getVarParameterIds()),
            'categoryId' => $group->getCategoryId()->getValue(),
            'alias' => $group->getAlias()->getValue(),
            'createdAt' => $group->getCreatedAt()->getValue(),
            'updatedAt' => $group->getUpdatedAt()->getValue(),
        ];
    }
}