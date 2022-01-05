<?php

declare(strict_types=1);

namespace App\Core\Service;

use Throwable;

interface LoggerServiceInterface
{
    public function error(Throwable $exception): void;
    public function warning(Throwable $exception): void;
    public function info(Throwable $exception): void;
}