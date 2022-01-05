<?php

declare(strict_types=1);

namespace App\Group\Application\Factory\Group;

use App\Group\Application\Dto\Group\FindByCriteriaRequest;
use App\Group\Application\Factory\Group\Search\OrderFactory;
use App\Group\Application\Factory\Status\IdFactory;
use App\Group\Domain\Model\Category\Id as CategoryId;
use App\Group\Domain\Model\Category\Name as CategoryName;
use App\Group\Domain\Model\Group\FindByCriteriaRequest as DomainRequest;
use App\Group\Domain\Model\Group\Id;
use App\Group\Domain\Model\Group\Name;
use App\Group\Domain\Model\Group\Search\Limit;
use App\Group\Domain\Model\Group\Search\Offset;
use App\Group\Domain\Model\Producer\Id as ProducerId;
use App\Group\Domain\Model\Producer\Name as ProducerName;
use App\Group\Domain\Model\Seller\Segment\Id as SellerSegmentId;
use App\Group\Domain\Model\VarParameter\Id as VarParameterId;
use App\Group\Domain\Model\VarParameter\Name as VarParameterName;

final class FindByCriteriaRequestFactory
{
    private OrderFactory $orderFactory;
    private IdFactory $idFactory;

    public function __construct(
        OrderFactory $orderFactory,
        IdFactory $idFactory
    ) {
        $this->orderFactory = $orderFactory;
        $this->idFactory = $idFactory;
    }

    public function build(FindByCriteriaRequest $request): DomainRequest
    {
        return new DomainRequest(
            null !== $request->getId() ? new Id($request->getId()) : null,
            null !== $request->getName() ? new Name($request->getName()) : null,
            null !== $request->getCategoryId() ? new CategoryId($request->getCategoryId()) : null,
            null !== $request->getCategoryName() ? new CategoryName($request->getCategoryName()) : null,
            null !== $request->getProducerId() ? new ProducerId($request->getProducerId()) : null,
            null !== $request->getProducerName() ? new ProducerName($request->getProducerName()) : null,
            null !== $request->getSellerSegmentId() ? new SellerSegmentId($request->getSellerSegmentId()) : null,
            null !== $request->getVarParameterId() ? new VarParameterId($request->getVarParameterId()) : null,
            null !== $request->getVarParameterName() ? new VarParameterName($request->getVarParameterName()) : null,
            $this->idFactory->buildCollection($request->getStatusIds()),
            $this->orderFactory->buildCollection($request->getOrders()),
            null !== $request->getLimit() ? new Limit($request->getLimit()) : null,
            null !== $request->getOffset() ? new Offset($request->getOffset()) : null,
        );
    }
}