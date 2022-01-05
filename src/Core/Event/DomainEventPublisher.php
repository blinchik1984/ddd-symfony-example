<?php

declare(strict_types=1);

namespace App\Core\Event;

use BadMethodCallException;

class DomainEventPublisher implements DomainEventPublisherInterface
{
    /**
     * @var DomainEventSubscriberInterface[]
     */
    private array $subscribers;
    private int $id = 0;

    public function __construct()
    {
        $this->subscribers = [];
    }

    /**
     * @throws BadMethodCallException
     */
    public function __clone()
    {
        throw new BadMethodCallException('Clone is not supported');
    }

    public function subscribe(DomainEventSubscriberInterface $domainEventSubscriber): int
    {
        $id = $this->id;
        $this->subscribers[$id] = $domainEventSubscriber;
        $this->id++;

        return $id;
    }

    public function unsubscribe(int $id): void
    {
        unset($this->subscribers[$id]);
    }

    public function publish(DomainEventInterface $domainEvent): void
    {
        foreach ($this->subscribers as $subscriber) {
            if ($subscriber->isSubscribedToEvent($domainEvent)) {
                $subscriber->handle($domainEvent);
            }
        }
    }
}
