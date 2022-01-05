<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model\Seller\Segment\Persistence\Postgres;

use App\Group\Domain\Model\Seller\Segment\SegmentRepositoryInterface;
use App\Group\Domain\Model\Seller\Segment\Segments;

final class SegmentRepository implements SegmentRepositoryInterface
{
    public function findAll(): Segments
    {
        // TODO: Implement findAll() method.
    }
}