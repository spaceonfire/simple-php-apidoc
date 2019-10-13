<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc;

use InvalidArgumentException;
use spaceonfire\SimplePhpApiDoc\Elements\Collections\FilterableByVisibilityCollectionInterface;
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
     * @var int
     */
    protected $propertiesVisibility;
    /**
     * @var int
     */
    protected $methodsVisibility;

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
     * Getter for `composer` property
     * @return array
     */
    public function getComposer(): array
    {
        return $this->composer;
    }

    /**
     * Setter for `composer` property
     * @param array $composer
     * @return static
     */
    public function setComposer(array $composer)
    {
        $this->composer = $composer;
        return $this;
    }

    /**
     * Getter for `propertiesVisibility` property
     * @return int
     */
    public function getPropertiesVisibility(): int
    {
        return $this->propertiesVisibility;
    }

    /**
     * Setter for `propertiesVisibility` property
     * @param int $propertiesVisibility
     * @return static
     */
    public function setPropertiesVisibility(int $propertiesVisibility)
    {
        $this->propertiesVisibility = $propertiesVisibility;
        return $this;
    }

    /**
     * Getter for `methodsVisibility` property
     * @return int
     */
    public function getMethodsVisibility(): int
    {
        return $this->methodsVisibility;
    }

    /**
     * Setter for `methodsVisibility` property
     * @param int $methodsVisibility
     * @return static
     */
    public function setMethodsVisibility(int $methodsVisibility)
    {
        $this->methodsVisibility = $methodsVisibility;
        return $this;
    }

    /** {@inheritDoc} */
    protected function configure()
    {
        $this
            ->setName('generate')
            ->addArgument('src', InputArgument::OPTIONAL | InputArgument::IS_ARRAY)
            ->addOption(
                'projectName',
                'p',
                InputOption::VALUE_OPTIONAL,
                '',
                $this->composer['name']
            )
            ->addOption(
                'visibility',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Visibility filter for both methods and properties',
                ['public']
            )
            ->addOption(
                'propertiesVisibility',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Visibility filter for properties'
            )
            ->addOption(
                'methodsVisibility',
                null,
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Visibility filter for methods'
            )
            ->addOption(
                'output',
                'o',
                InputOption::VALUE_REQUIRED,
                '',
                'docs'
            )
            ->addOption(
                'rendererClass',
                'r',
                InputOption::VALUE_OPTIONAL,
                '',
                MarkdownRenderer::class
            );
    }

    /** {@inheritDoc} */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        // Find source paths
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

        // Validate renderer class option
        $rendererClass = $input->getOption('rendererClass');
        if (!class_exists($rendererClass)) {
            throw new InvalidArgumentException('Cannot find renderer class');
        }
        if (!in_array(RendererInterface::class, class_implements($rendererClass), true)) {
            throw new InvalidArgumentException('Renderer class must implement ' . RendererInterface::class);
        }

        // Validate properties visibility option
        $propertiesVisibility = $input->getOption('propertiesVisibility') ?: $input->getOption('visibility');
        $propertiesVisibility = $this->filterVisibilityOptionValues($propertiesVisibility);
        if (empty($propertiesVisibility)) {
            throw new InvalidArgumentException('Invalid visibility options provided');
        }
        $this->setPropertiesVisibility($this->convertVisibilityOptionToBitmask($propertiesVisibility));

        // Validate methods visibility option
        $methodsVisibility = $input->getOption('methodsVisibility') ?: $input->getOption('visibility');
        $methodsVisibility = $this->filterVisibilityOptionValues($methodsVisibility);
        if (empty($methodsVisibility)) {
            throw new InvalidArgumentException('Invalid visibility options provided');
        }
        $this->setMethodsVisibility($this->convertVisibilityOptionToBitmask($methodsVisibility));
    }

    protected function filterVisibilityOptionValues(array $values)
    {
        return array_intersect($values, ['public', 'protected', 'private']);
    }

    protected function convertVisibilityOptionToBitmask(array $values): int
    {
        $result = 0;

        if (in_array('public', $values, true)) {
            $result |= FilterableByVisibilityCollectionInterface::VISIBILITY_PUBLIC;
        }

        if (in_array('protected', $values, true)) {
            $result |= FilterableByVisibilityCollectionInterface::VISIBILITY_PROTECTED;
        }

        if (in_array('private', $values, true)) {
            $result |= FilterableByVisibilityCollectionInterface::VISIBILITY_PRIVATE;
        }

        return $result;
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
            ->setPropertiesVisibility($this->getPropertiesVisibility())
            ->setMethodsVisibility($this->getMethodsVisibility())
            ->run();
    }
}
