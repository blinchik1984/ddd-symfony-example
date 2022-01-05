<?php

namespace App\Group\Application\Dto\Group;

final class FindByCriteriaRequest
{
    private ?int $id;
    private ?string $name;
    private ?int $categoryId;
    private ?string $categoryName;
    private ?int $producerId;
    private ?string $producerName;
    private ?int $sellerSegmentId;
    private ?int $varParameterId;
    private ?string $varParameterName;
    private array $statusIds;
    private array $orders;
    private ?int $limit;
    private ?int $offset;

    public function __construct(
        ?int $id,
        ?string $name,
        ?int $categoryId,
        ?string $categoryName,
        ?int $producerId,
        ?string $producerName,
        ?int $sellerSegmentId,
        ?int $varParameterId,
        ?string $varParameterName,
        array $statusIds,
        array $orders,
        ?int $limit,
        ?int $offset
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function getProducerId(): ?int
    {
        return $this->producerId;
    }

    public function getProducerName(): ?string
    {
        return $this->producerName;
    }

    public function getSellerSegmentId(): ?int
    {
        return $this->sellerSegmentId;
    }

    public function getVarParameterId(): ?int
    {
        return $this->varParameterId;
    }

    public function getVarParameterName(): ?string
    {
        return $this->varParameterName;
    }

    public function getStatusIds(): array
    {
        return $this->statusIds;
    }

    public function getOrders(): array
    {
        return $this->orders;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }
}