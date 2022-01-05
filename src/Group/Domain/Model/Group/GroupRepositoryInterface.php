<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Group\Domain\Model\Group\Search\Criteria;

interface GroupRepositoryInterface
{
    public function findByIds(Ids $ids): Groups;
    public function findByCriteria(Criteria $criteria): Groups;
    public function persistCollection(Groups $groups): void;
}