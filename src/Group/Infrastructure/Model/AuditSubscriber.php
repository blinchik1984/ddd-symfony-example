<?php

declare(strict_types=1);

namespace App\Group\Infrastructure\Model;

use App\Audit\Application\Dto\Log\PersistRequest;
use App\Audit\Application\Service\Log\Persist as PersistService;
use App\Core\Event\DomainEventInterface;
use App\Core\Event\DomainEventSubscriberInterface;
use App\Group\Domain\Model\Group\Groups;
use App\Group\Domain\Model\Group\GroupsWerePersisted;

final class AuditSubscriber implements DomainEventSubscriberInterface
{
    private PersistService $persistService;

    public function __construct(
        PersistService $persistService
    ) {
        $this->persistService = $persistService;
    }

    public function isSubscribedToEvent(DomainEventInterface $domainEvent): bool
    {
        return $domainEvent instanceof GroupsWerePersisted;
    }

    public function handle(DomainEventInterface $domainEvent): void
    {
        if (!$domainEvent instanceof GroupsWerePersisted) {
            return;
        }
        $this->persistService->execute(
            new PersistRequest(
                'group',
                $this->getChanges($domainEvent->getNewGroups(), $domainEvent->getOldGroups()),
            ),
        );
    }

    private function getChanges(Groups $newGroups, Groups $oldGroups): array
    {

    }
}