<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Seller\Segment;

interface SegmentRepositoryInterface
{
    public function findAll(): Segments;
}