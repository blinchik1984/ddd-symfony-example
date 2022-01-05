<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group;

use App\Core\Event\DomainEventPublisher;

final class PersistService
{
    private GroupRepositoryInterface $groupRepository;
    private DomainEventPublisher $domainEventPublisher;

    public function __construct(
        GroupRepositoryInterface $groupRepository,
        DomainEventPublisher $domainEventPublisher
    ) {
        $this->groupRepository = $groupRepository;
        $this->domainEventPublisher = $domainEventPublisher;
    }

    public function execute(Groups $groups): void
    {
        $oldGroups = $this->groupRepository->findByIds($groups->getIds());
        $this->groupRepository->persistCollection($groups);
        $this->domainEventPublisher->publish(
            new GroupsWerePersisted($groups, $oldGroups),
        );
    }
}