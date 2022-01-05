<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Category;

final class Category
{
    private Id $id;
    private Name $name;

    public function __construct(
        Id $id,
        Name $name
    ) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }
}