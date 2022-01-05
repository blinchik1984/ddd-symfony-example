<?php

declare(strict_types=1);

namespace App\Core\Event;

interface DomainEventSubscriberInterface
{
    public function handle(DomainEventInterface $domainEvent): void;
    public function isSubscribedToEvent(DomainEventInterface $domainEvent): bool;
}
