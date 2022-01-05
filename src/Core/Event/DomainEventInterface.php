<?php

declare(strict_types=1);

namespace App\Core\Event;

use DateTimeInterface;

interface DomainEventInterface
{
    public function occurredOn() : DateTimeInterface;
}
