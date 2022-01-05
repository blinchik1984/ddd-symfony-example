<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Core\Event\AbstractDomainEvent;

final class GroupsWerePersisted extends AbstractDomainEvent
{
    private Groups $newGroups;
    private Groups $oldGroups;

    public function __construct(
        Groups $newGroups,
        Groups $oldGroups
    ) {
        parent::__construct();
        $this->newGroups = $newGroups;
        $this->oldGroups = $oldGroups;
    }

    public function getNewGroups(): Groups
    {
        return $this->newGroups;
    }

    public function getOldGroups(): Groups
    {
        return $this->oldGroups;
    }
}