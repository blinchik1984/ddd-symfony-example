<?php

declare(strict_types=1);

namespace App\Core\Service;

use App\Core\Exception\AbstractPackageException;
use JetBrains\PhpStorm\Pure;
use Psr\Log\LoggerInterface;
use Throwable;

class LoggerService implements LoggerServiceInterface
{
    private LoggerInterface $logger;

    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function error(Throwable $exception): void
    {
        $this->logger->error($exception->getMessage(), $this->getContext($exception));
    }

    public function warning(Throwable $exception): void
    {
        $this->logger->warning($exception->getMessage(), $this->getContext($exception));
    }

    public function info(Throwable $exception): void
    {
        $this->logger->info($exception->getMessage(), $this->getContext($exception));
    }

    #[Pure] private function getContext(Throwable $exception): array
    {
        if (!$exception instanceof AbstractPackageException) {
            return [];
        }

        return $exception->getContext();
    }
}