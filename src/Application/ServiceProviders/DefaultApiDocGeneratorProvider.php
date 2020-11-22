<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\ServiceProviders;

use spaceonfire\ApiDoc\Generator\ApiDocGenerator;
use spaceonfire\ApiDoc\Generator\FileNameStrategy;
use spaceonfire\ApiDoc\Generator\FileNameStrategyInterface;
use spaceonfire\ApiDoc\Generator\GeneratorInterface;
use spaceonfire\ApiDoc\Generator\LocalFilesystemPersister;
use spaceonfire\ApiDoc\Generator\PersisterInterface;
use spaceonfire\Container\ServiceProvider\AbstractServiceProvider;

final class DefaultApiDocGeneratorProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function provides(): array
    {
        return [
            GeneratorInterface::class,
            PersisterInterface::class,
            FileNameStrategyInterface::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->getContainer()->add(GeneratorInterface::class, ApiDocGenerator::class);

        if (!$this->getContainer()->has(PersisterInterface::class)) {
            $this->getContainer()->add(PersisterInterface::class, LocalFilesystemPersister::class);
        }

        if (!$this->getContainer()->has(FileNameStrategyInterface::class)) {
            $this->getContainer()->add(FileNameStrategyInterface::class, FileNameStrategy::class);
        }
    }
}
