<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\Console;

use spaceonfire\ApiDoc\Application\ApiDocKernel;
use spaceonfire\ApiDoc\Config\Config;
use spaceonfire\ApiDoc\Config\Processor\ConsoleInputProcessor;
use spaceonfire\ApiDoc\Generator\GeneratorInterface;
use spaceonfire\ApiDoc\Generator\PersisterInterface;
use spaceonfire\ApiDoc\Project\ProjectFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Traversable;

final class GenerateCommand extends Command
{
    protected static $defaultName = 'generate';

    /**
     * @var ApiDocKernel
     */
    private $kernel;

    public function __construct(ApiDocKernel $kernel, ?string $name = null)
    {
        $this->kernel = $kernel;

        parent::__construct($name);
    }

    /**
     * @inheritDoc
     */
    protected function configure(): void
    {
        ConsoleInputProcessor::configureCommand($this);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $config = $this->kernel->getContainer()->get(Config::class);

        $projectFactory = $this->kernel->getContainer()->get(ProjectFactory::class);
        $project = $projectFactory->make($config);

        $generator = $this->kernel->getContainer()->get(GeneratorInterface::class);
        $persister = $this->kernel->getContainer()->get(PersisterInterface::class);

        $files = $generator->generate($project);

        // Do not write to filesystem before all files generated
        if ($files instanceof Traversable) {
            $files = iterator_to_array($files);
        }

        foreach ($files as $file) {
            $persister->persist($file);
        }

        return 0;
    }
}
