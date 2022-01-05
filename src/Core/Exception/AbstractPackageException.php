<?php

declare(strict_types=1);

namespace App\Core\Exception;

use Exception;
use Throwable;

abstract class AbstractPackageException extends Exception
{
    private array $context = [];

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $message = "[{$this->getPackageName()}]{$message}";
        parent::__construct($message, $code, $previous);
    }

    public function getContext(): array
    {
        return $this->context;
    }

    public function setContext(array $context): void
    {
        $this->context = $context;
    }

    abstract protected function getPackageName(): string;
}