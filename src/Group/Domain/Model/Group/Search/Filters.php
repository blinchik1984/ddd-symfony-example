<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group\Search;

use App\Group\Domain\Model\Category\Id as CategoryId;
use App\Group\Domain\Model\Group\Id;
use App\Group\Domain\Model\Group\Name;
use App\Group\Domain\Model\Producer\Id as ProducerId;
use App\Group\Domain\Model\Seller\Segment\Id as SellerSegmentId;
use App\Group\Domain\Model\Status\Statuses;
use App\Group\Domain\Model\VarParameter\Id as VarParameterId;

final class Filters
{
    private ?Name $name;
    private ?Id $id;
    private ?CategoryId $categoryId;
    private ?ProducerId $producerId;
    private ?SellerSegmentId $sellerSegmentId;
    private ?VarParameterId $varParameterId;
    private Statuses $statuses;

    public function __construct(
        ?Name $name,
        ?Id $id,
        ?CategoryId $categoryId,
        ?ProducerId $producerId,
        ?SellerSegmentId $sellerSegmentId,
        ?VarParameterId $varParameterId,
        Statuses $statuses
    ) {
        $this->name = $name;
        $this->id = $id;
        $this->categoryId = $categoryId;
        $this->producerId = $producerId;
        $this->sellerSegmentId = $sellerSegmentId;
        $this->varParameterId = $varParameterId;
        $this->statuses = $statuses;
    }

    public function getName(): ?Name
    {
        return $this->name;
    }

    public function getId(): ?Id
    {
        return $this->id;
    }

    public function getCategoryId(): ?CategoryId
    {
        return $this->categoryId;
    }

    public function getProducerId(): ?ProducerId
    {
        return $this->producerId;
    }

    public function getSellerSegmentId(): ?SellerSegmentId
    {
        return $this->sellerSegmentId;
    }

    public function getVarParameterId(): ?VarParameterId
    {
        return $this->varParameterId;
    }

    public function getStatuses(): Statuses
    {
        return $this->statuses;
    }
}