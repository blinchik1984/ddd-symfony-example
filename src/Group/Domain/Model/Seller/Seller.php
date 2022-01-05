<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Seller;

use App\Group\Domain\Model\Seller\Segment\Segment;

final class Seller
{
    private Id $id;
    private Name $name;
    private Segment $segment;

    public function __construct(
        Id $id,
        Name $name,
        Segment $segment
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->segment = $segment;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getSegment(): Segment
    {
        return $this->segment;
    }
}