<?php

declare(strict_types=1);

namespace App\Core\Event;

use DateTimeImmutable;
use DateTimeInterface;

abstract class AbstractDomainEvent implements DomainEventInterface
{
    private DateTimeImmutable $occurredOn;

    public function __construct()
    {
        $this->occurredOn = new DateTimeImmutable();
    }

    public function occurredOn(): DateTimeInterface
    {
        return $this->occurredOn;
    }
}
