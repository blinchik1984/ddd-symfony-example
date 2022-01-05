<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\VarParameter;

use App\Group\Domain\Model\DateTime;
use App\Group\Domain\Model\Status\Status;
use App\Group\Domain\Model\VarParameter\Type\Type;

final class VarParameter
{
    private Id $id;
    private Name $name;
    private Status $status;
    private Type $type;
    private IsChangePhoto $isChangePhoto;
    private IsShowName $isShowName;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(
        Id $id,
        Name $name,
        Status $status,
        Type $type,
        IsChangePhoto $isChangePhoto,
        IsShowName $isShowName,
        DateTime $createdAt,
        DateTime $updatedAt
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->type = $type;
        $this->isChangePhoto = $isChangePhoto;
        $this->isShowName = $isShowName;
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

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getIsChangePhoto(): IsChangePhoto
    {
        return $this->isChangePhoto;
    }

    public function getIsShowName(): IsShowName
    {
        return $this->isShowName;
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