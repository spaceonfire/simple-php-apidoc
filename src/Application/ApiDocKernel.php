<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application;

use Psr\Container\ContainerInterface as PsrContainerInterface;
use spaceonfire\Container\CompositeContainer;
use spaceonfire\Container\Container;
use spaceonfire\Container\ContainerInterface;
use spaceonfire\Container\Definition\DefinitionTag;
use spaceonfire\Container\ReflectionContainer;
use spaceonfire\Container\ServiceProvider\ServiceProviderInterface;
use Symfony\Component\Console\Application as ConsoleApplication;
use Symfony\Component\Console\Input as ConsoleInput;
use Symfony\Component\Console\Output as ConsoleOutput;

final class ApiDocKernel
{
    /**
     * @var CompositeContainer
     */
    protected $container;
    /**
     * @var bool
     */
    protected $debugModeEnabled;

    public function __construct(bool $debugModeEnabled = false)
    {
        $this->debugModeEnabled = $debugModeEnabled;

        $this->container = new CompositeContainer([
            50 => new Container(),
            100 => new ReflectionContainer(),
        ]);

        $this->container->add(PsrContainerInterface::class, ContainerInterface::class);
        $this->container->add(ContainerInterface::class, [$this, 'getContainer']);

        $this->container->share(self::class, $this);
        $this->container->add('kernel.debug', [$this, 'isDebugModeEnabled']);

        foreach ($this->loadServiceProviders() as $serviceProvider) {
            $this->container->addServiceProvider($serviceProvider);
        }
    }

    /**
     * @return string[]|ServiceProviderInterface[]
     */
    protected function loadServiceProviders(): iterable
    {
        yield ServiceProviders\ConsoleCommandsProvider::class;
        yield ServiceProviders\ConfigProvider::class;
        yield ServiceProviders\DocBlockResolverProvider::class;
        yield ServiceProviders\TypeFactoryProvider::class;
        yield ServiceProviders\ElementFactoryProvider::class;
        yield ServiceProviders\LinkServiceProvider::class;
        yield ServiceProviders\SignatureRendererProvider::class;
        yield ServiceProviders\TranslatorProvider::class;
        yield ServiceProviders\DefaultRendererProvider::class;
        yield ServiceProviders\DefaultApiDocGeneratorProvider::class;
        yield ServiceProviders\FallbackBetterReflectionProvider::class;
    }

    /**
     * Returns the container
     * @return CompositeContainer
     */
    public function getContainer(): CompositeContainer
    {
        return $this->container;
    }

    /**
     * Running debug mode?
     * @return bool
     */
    public function isDebugModeEnabled(): bool
    {
        return $this->debugModeEnabled;
    }

    /**
     * Configure symfony/console application
     * @param ConsoleApplication $app
     * @param ConsoleInput\InputInterface $input
     * @param ConsoleOutput\OutputInterface $output
     */
    public function configureConsoleApplication(
        ConsoleApplication $app,
        ConsoleInput\InputInterface $input,
        ConsoleOutput\OutputInterface $output
    ): void {
        if (\PHP_SAPI !== 'cli') {
            // TODO: trigger error
            return;
        }

        // Register console I/O first, which can be used as dependencies of some command (logger for example)
        $this->container->share(ConsoleInput\InputInterface::class, $input);
        $this->container->share(ConsoleOutput\OutputInterface::class, $output);

        $this->determineDebugModeFromConsoleInput($input);

        $commands = $this->container->getTagged(DefinitionTag::CONSOLE_COMMAND);

        foreach ($commands as $command) {
            $app->add($command);
        }
    }

    private function determineDebugModeFromConsoleInput(ConsoleInput\InputInterface $input): void
    {
        // Debug option defined and bool(true) value
        if ($input->hasParameterOption('--debug', true)) {
            $this->debugModeEnabled = true;
            return;
        }

        // Verbosity level set to 3+
        if ($input->hasParameterOption('-vvv', true)) {
            $this->debugModeEnabled = true;
            return;
        }
    }
}
