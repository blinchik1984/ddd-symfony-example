<?php

declare(strict_types=1);

namespace App\Core;

abstract class AbstractCollection implements \Iterator, \Countable
{
    protected array $items = [];

    public function count(): int
    {
        return count($this->items);
    }

    public function current(): mixed
    {
        return current($this->items);
    }

    public function key(): int|null|string
    {
        return key($this->items);
    }

    public function next(): mixed
    {
        return next($this->items);
    }

    public function rewind(): mixed
    {
        return reset($this->items);
    }

    public function valid(): bool
    {
        return null !== key($this->items);
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }
}