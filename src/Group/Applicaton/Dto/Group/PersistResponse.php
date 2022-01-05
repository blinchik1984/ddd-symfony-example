<?php

namespace App\Group\Application\Dto\Group;

final class PersistResponse
{
    private bool $success;
    private string $errorMessage;
    private array $groups;

    public function __construct(
        bool $success,
        string $errorMessage,
        array $groups
    ) {
        $this->success = $success;
        $this->errorMessage = $errorMessage;
        $this->groups = $groups;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    public function getGroups(): array
    {
        return $this->groups;
    }
}