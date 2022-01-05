<?php

declare(strict_types=1);

namespace App\Core\Event;

interface DomainEventPublisherInterface
{
    public function publish(DomainEventInterface $domainEvent): void;
}
