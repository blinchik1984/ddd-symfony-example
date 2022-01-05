<?php

declare(strict_types=1);

namespace App\Group\Domain\Model\Group\Search\Order;

use App\Core\AbstractSimpleStringValueObject;
use App\Core\Exception\Group\Search\Order\NameInvalidValueException;

use function in_array;

final class Name extends AbstractSimpleStringValueObject
{
    private const NAME = 'name';
    private const STATUS = 'status';
    private const AVAILABLE_LIST = [
        self::NAME,
        self::STATUS,
    ];

    public function isName(): bool
    {
        return self::NAME === $this->getValue();
    }

    public function isStatus(): bool
    {
        return self::STATUS === $this->getValue();
    }

    /**
     * @throws NameInvalidValueException
     */
    protected function preConditionValidation(string $rawValue): void
    {
        if (!in_array($rawValue, self::AVAILABLE_LIST)) {
            throw NameInvalidValueException::create($rawValue, self::AVAILABLE_LIST);
        }
    }
}