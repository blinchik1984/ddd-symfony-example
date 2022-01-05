<?php

declare(strict_types=1);

namespace App\Audit\Application\Dto\Log;

final class PersistRequest
{
    private string $entityName;
    private array $changes;

    public function __construct(
        string $entityName,
        array $changes
    ) {
        $this->entityName = $entityName;
        $this->changes = $changes;
    }

    public function getEntityName(): string
    {
        return $this->entityName;
    }

    public function getChanges(): array
    {
        return $this->changes;
    }
}