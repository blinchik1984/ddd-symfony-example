<?php

declare(strict_types=1);

namespace App\Core;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\CommandLoader\CommandLoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use function array_keys;

final class CommandLoader implements CommandLoaderInterface
{
    protected array $commandMap = [];
    protected ContainerBuilder $container;

    /**
     * @param iterable<Command> $commands
     */
    public function __construct(iterable $commands)
    {
        foreach ($commands as $command) {
            $this->commandMap[$command->getCommandName()] = $command;
        }
    }

    public function get(string $name)
    {
        return $this->commandMap[$name];
    }

    public function getNames(): array
    {
        return array_keys($this->commandMap);
    }

    public function has(string $name): bool
    {
        return isset($this->commandMap[$name]);
    }
}
