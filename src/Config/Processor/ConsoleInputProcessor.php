<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Config\Processor;

use spaceonfire\ApiDoc\Config\Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Webmozart\Assert\Assert;

final class ConsoleInputProcessor implements ProcessorInterface
{
    /**
     * @var InputInterface
     */
    private $input;

    /**
     * ConsoleInputProcessor constructor.
     * @param InputInterface $input
     */
    public function __construct(InputInterface $input)
    {
        $this->input = $input;
    }

    /**
     * @inheritDoc
     */
    public function process(Config $config): void
    {
        $builder = new BuilderProcessor();

        if (
            $this->input->hasOption('projectName') &&
            null !== $projectName = $this->input->getOption('projectName')
        ) {
            Assert::string($projectName);
            $builder = $builder->withProjectName($projectName);
        }

        if (
            $this->input->hasOption('output') &&
            null !== $outputDirectory = $this->input->getOption('output')
        ) {
            Assert::string($outputDirectory);
            $builder = $builder->withOutputDirectory($outputDirectory);
        }

        if ($this->input->hasArgument('src')) {
            /** @var string[] $sourceDirectories */
            $sourceDirectories = $this->input->getArgument('src');

            if (count($sourceDirectories) > 0) {
                $builder = $builder->withSourceDirectories($sourceDirectories);
            }
        }

        $builder->process($config);
    }

    public static function configureCommand(Command $command): void
    {
        $command
            ->addOption(
                'config',
                'c',
                InputOption::VALUE_OPTIONAL,
                sprintf('Path to custom config file [default: "%s"]', ConfigFileProcessor::DEFAULT_CONFIG_FILENAME)
            )
            ->addOption(
                'projectName',
                'p',
                InputOption::VALUE_OPTIONAL,
                'Your project name'
            )
            ->addOption(
                'output',
                'o',
                InputOption::VALUE_REQUIRED,
                'Directory where to save generated apiDoc files'
            )
            ->addArgument('src', InputArgument::OPTIONAL | InputArgument::IS_ARRAY);
    }
}
