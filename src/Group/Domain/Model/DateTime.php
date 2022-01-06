<?php

declare(strict_types=1);

namespace App\Group\Domain\Model;

use App\Core\AbstractDateTimeValueObject;
use App\Group\Domain\Exception\DateTimeInvalidValueException;
use DateTimeZone;
use Throwable;

final class DateTime extends AbstractDateTimeValueObject
{
    /**
     * @throws DateTimeInvalidValueException
     */
    public function __construct(string $datetime = "now", ?DateTimeZone $timezone = null)
    {
        try {
            parent::__construct($datetime, $timezone);
        } catch (Throwable $exception) {
            throw DateTimeInvalidValueException::create($datetime, $exception);
        }
    }
}