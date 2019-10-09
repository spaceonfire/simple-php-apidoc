<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc;

use InvalidArgumentException;
use spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownRenderer;
use spaceonfire\SimplePhpApiDoc\Renderers\RendererInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class GeneratorCommand extends Command
{
    /**
     * @var Filesystem
     */
    private $fs;
    /**
     * @var array
     */
    private $composer;

    /**
     * GeneratorCommand constructor.
     * @param string|null $name
     * @param array $composer
     */
    public function __construct(array $composer = [], string $name = null)
    {
        $this->fs = new Filesystem();
        $this->setComposer($composer);
        parent::__construct($name);
    }

    /**
     * @return array
     */
    public function getComposer(): array
    {
        return $this->composer;
    }

    /**
     * @param array $composer
     * @return static
     */
    public function setComposer(array $composer)
    {
        $this->composer = $composer;
        return $this;
    }

    /** {@inheritDoc} */
    protected function configure()
    {
        $this
            ->setName('generate')
            ->addArgument('src', InputArgument::OPTIONAL | InputArgument::IS_ARRAY)
            ->addOption('projectName', 'p', InputOption::VALUE_OPTIONAL, '', $this->composer['name'])
            ->addOption('output', 'o', InputOption::VALUE_REQUIRED, '', 'docs')
            ->addOption('rendererClass', 'r', InputOption::VALUE_OPTIONAL, '', MarkdownRenderer::class);
    }

    /** {@inheritDoc} */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        /** @var string[] $rawSrc */
        $rawSrc = $input->getArgument('src');

        if (empty($rawSrc)) {
            $rawSrc = [];
            foreach ($this->composer['autoload'] as $type => $autoload) {
                switch ($type) {
                    case 'psr-4':
                    case 'psr-0':
                        foreach ($autoload as $dirs) {
                            foreach ((array)$dirs as $dir) {
                                if ($dir !== '') {
                                    $rawSrc[] = $dir;
                                }
                            }
                        }
                        break;
                }
            }
        }

        $src = array_filter($rawSrc, function ($path) {
            return $this->fs->exists($path);
        });

        if (empty($src)) {
            throw new InvalidArgumentException('No real path provided in src argument');
        }

        $input->setArgument('src', $src);

        $rendererClass = $input->getOption('rendererClass');
        if (!class_exists($rendererClass)) {
            throw new InvalidArgumentException('Cannot find renderer class');
        }
        if (!in_array(RendererInterface::class, class_implements($rendererClass), true)) {
            throw new InvalidArgumentException('Renderer class must implement ' . RendererInterface::class);
        }
    }

    /**
     * {@inheritDoc}
     * @throws \phpDocumentor\Reflection\Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $src = $input->getArgument('src');

        $context = new Context($input->getOption('projectName'), Finder::create()
            ->files()
            ->name('*.php')
            ->in($src));

        $rendererClass = $input->getOption('rendererClass');
        /** @var RendererInterface $renderer */
        $renderer = new $rendererClass();
        $renderer
            ->setFs($this->fs)
            ->setOutput($output)
            ->setContext($context)
            ->setOutputDir($input->getOption('output'))
            ->run();
    }
}
