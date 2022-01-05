<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Group\Domain\Model\Category\Id as CategoryId;
use App\Group\Domain\Model\Category\Name as CategoryName;
use App\Group\Domain\Model\Group\Search\Limit;
use App\Group\Domain\Model\Group\Search\Offset;
use App\Group\Domain\Model\Group\Search\Order\Orders;
use App\Group\Domain\Model\Producer\Id as ProducerId;
use App\Group\Domain\Model\Producer\Name as ProducerName;
use App\Group\Domain\Model\Seller\Segment\Id as SellerSegmentId;
use App\Group\Domain\Model\Status\Ids as StatusIds;
use App\Group\Domain\Model\VarParameter\Id as VarParameterId;
use App\Group\Domain\Model\VarParameter\Name as VarParameterName;

final class FindByCriteriaRequest
{
    private ?Id $id;
    private ?Name $name;
    private ?CategoryId $categoryId;
    private ?CategoryName $categoryName;
    private ?ProducerId $producerId;
    private ?ProducerName $producerName;
    private ?SellerSegmentId $sellerSegmentId;
    private ?VarParameterId $varParameterId;
    private ?VarParameterName $varParameterName;
    private ?StatusIds $statusIds;
    private Orders $orders;
    private ?Limit $limit;
    private ?Offset $offset;

    public function __construct(
        ?Id $id,
        ?Name $name,
        ?CategoryId $categoryId,
        ?CategoryName $categoryName,
        ?ProducerId $producerId,
        ?ProducerName $producerName,
        ?SellerSegmentId $sellerSegmentId,
        ?VarParameterId $varParameterId,
        ?VarParameterName $varParameterName,
        ?StatusIds $statusIds,
        Orders $orders,
        ?Limit $limit,
        ?Offset $offset
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->categoryId = $categoryId;
        $this->categoryName = $categoryName;
        $this->producerId = $producerId;
        $this->producerName = $producerName;
        $this->sellerSegmentId = $sellerSegmentId;
        $this->varParameterId = $varParameterId;
        $this->varParameterName = $varParameterName;
        $this->statusIds = $statusIds;
        $this->orders = $orders;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function getId(): ?Id
    {
        return $this->id;
    }

    public function getName(): ?Name
    {
        return $this->name;
    }

    public function getCategoryId(): ?CategoryId
    {
        return $this->categoryId;
    }

    public function getCategoryName(): ?CategoryName
    {
        return $this->categoryName;
    }

    public function getProducerId(): ?ProducerId
    {
        return $this->producerId;
    }

    public function getProducerName(): ?ProducerName
    {
        return $this->producerName;
    }

    public function getSellerSegmentId(): ?SellerSegmentId
    {
        return $this->sellerSegmentId;
    }

    public function getVarParameterId(): ?VarParameterId
    {
        return $this->varParameterId;
    }

    public function getVarParameterName(): ?VarParameterName
    {
        return $this->varParameterName;
    }

    public function getStatusIds(): ?StatusIds
    {
        return $this->statusIds;
    }

    public function getOrders(): Orders
    {
        return $this->orders;
    }

    public function getLimit(): ?Limit
    {
        return $this->limit;
    }

    public function getOffset(): ?Offset
    {
        return $this->offset;
    }
}