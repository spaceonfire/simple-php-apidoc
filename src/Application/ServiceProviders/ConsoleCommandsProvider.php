<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\ServiceProviders;

use spaceonfire\ApiDoc\Application\Console;
use spaceonfire\Container\Definition\DefinitionTag;
use spaceonfire\Container\ServiceProvider\AbstractServiceProvider;

final class ConsoleCommandsProvider extends AbstractServiceProvider
{
    private const CONSOLE_COMMANDS = [
        Console\GenerateCommand::class,
    ];

    /**
     * @inheritDoc
     */
    public function provides(): array
    {
        return array_merge(
            self::CONSOLE_COMMANDS,
            [DefinitionTag::CONSOLE_COMMAND]
        );
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        foreach (self::CONSOLE_COMMANDS as $command) {
            $this->getContainer()->share($command)->addTag(DefinitionTag::CONSOLE_COMMAND);
        }
    }
}
