<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Group\Domain\Model\Category\Id as CategoryId;
use App\Group\Domain\Model\DateTime;
use App\Group\Domain\Model\Producer\Id as ProducerId;
use App\Group\Domain\Model\Seller\Id as SellerId;
use App\Group\Domain\Model\Status\Status;
use App\Group\Domain\Model\VarParameter\Ids as VarParameterIds;

final class Group
{
    private Id $id;
    private Name $name;
    private Alias $alias;
    private MathPath $mathPath;
    private Order $order;
    private Status $status;
    private CategoryId $categoryId;
    private SellerId $sellerId;
    private ProducerId $producerId;
    private VarParameterIds $varParameterIds;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(
        Id $id,
        Name $name,
        Alias $alias,
        MathPath $mathPath,
        Order $order,
        Status $status,
        CategoryId $categoryId,
        SellerId $sellerId,
        ProducerId $producerId,
        VarParameterIds $varParameterIds,
        DateTime $createdAt,
        DateTime $updatedAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->alias = $alias;
        $this->mathPath = $mathPath;
        $this->order = $order;
        $this->status = $status;
        $this->categoryId = $categoryId;
        $this->sellerId = $sellerId;
        $this->producerId = $producerId;
        $this->varParameterIds = $varParameterIds;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getAlias(): Alias
    {
        return $this->alias;
    }

    public function getMathPath(): MathPath
    {
        return $this->mathPath;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getCategoryId(): CategoryId
    {
        return $this->categoryId;
    }

    public function getSellerId(): SellerId
    {
        return $this->sellerId;
    }

    public function getProducerId(): ProducerId
    {
        return $this->producerId;
    }

    public function getVarParameterIds(): VarParameterIds
    {
        return $this->varParameterIds;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
}