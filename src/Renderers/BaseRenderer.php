<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Renderers;

use phpDocumentor\Reflection\Fqsen;
use RuntimeException;
use spaceonfire\SimplePhpApiDoc\Context;
use spaceonfire\SimplePhpApiDoc\Elements\ClassElement;
use spaceonfire\SimplePhpApiDoc\Elements\InterfaceElement;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;

abstract class BaseRenderer implements RendererInterface
{
    /**
     * @var Context
     */
    protected $context;
    /**
     * @var string
     */
    protected $outputDir;
    /**
     * @var string
     */
    protected $viewsDir;
    /**
     * @var Filesystem Symfony Filesystem Component
     */
    protected $fs;
    /**
     * @var OutputInterface Output interface of Symfony Console Component
     */
    protected $output;

    public function __construct(Context $context = null, string $outputDir = null)
    {
        $context && $this->setContext($context);
        $outputDir && $this->setOutputDir($outputDir);
    }

    /** {@inheritDoc} */
    public function getContext(): Context
    {
        return $this->context;
    }

    /** {@inheritDoc} */
    public function setContext(Context $context): RendererInterface
    {
        $this->context = $context;
        return $this;
    }

    /** {@inheritDoc} */
    public function getOutputDir(): string
    {
        return $this->outputDir;
    }

    /** {@inheritDoc} */
    public function setOutputDir(string $outputDir): RendererInterface
    {
        if ($this->fs && !$this->fs->isAbsolutePath($this->outputDir)) {
            $outputDir = ltrim($outputDir, '\\/');
            $outputDir = getcwd() . DIRECTORY_SEPARATOR . $outputDir;
        }
        $this->outputDir = $outputDir;
        return $this;
    }

    /** {@inheritDoc} */
    public function getViewsDir(): string
    {
        return $this->viewsDir;
    }

    /** {@inheritDoc} */
    public function setViewsDir(string $viewsDir): RendererInterface
    {
        if ($this->fs && !$this->fs->isAbsolutePath($this->viewsDir)) {
            $viewsDir = ltrim($viewsDir, '\\/');
            $viewsDir = getcwd() . DIRECTORY_SEPARATOR . $viewsDir;
        }
        $this->viewsDir = $viewsDir;
        return $this;
    }

    /** {@inheritDoc} */
    public function getFs(): Filesystem
    {
        return $this->fs;
    }

    /** {@inheritDoc} */
    public function setFs(Filesystem $fs): RendererInterface
    {
        $this->fs = $fs;
        return $this;
    }

    /** {@inheritDoc} */
    public function getOutput(): OutputInterface
    {
        return $this->output;
    }

    /** {@inheritDoc} */
    public function setOutput(OutputInterface $output): RendererInterface
    {
        $this->output = $output;
        return $this;
    }

    /** {@inheritDoc} */
    public function run(): void
    {
        $this->fs->remove($this->outputDir);
        $this->fs->mkdir($this->outputDir);

        $order = [
            'interfaces',
            'classes',
        ];

        foreach ($this->context->getNamespaces() as $namespace) {
            $path = $this->outputDir . str_replace('\\', DIRECTORY_SEPARATOR, (string)$namespace->getFqsen());
            $this->fs->mkdir($path);

            foreach ($order as $item) {
                $getMethod = 'get' . ucfirst($item);
                $renderMethod = 'render' . ucfirst($item);
                if (!method_exists($namespace, $getMethod) || !method_exists($this, $renderMethod)) {
                    continue;
                }

                /** @var Fqsen $fqsen */
                foreach ($namespace->$getMethod() as $fqsen) {
                    $element = $this->context->getElement((string)$fqsen);
                    if (!$element) {
                        continue;
                    }
                    $content = $this->$renderMethod($element);
                    $this->fs->dumpFile($path . DIRECTORY_SEPARATOR . $this->getFileName($fqsen), $content);
                }
            }
        }
    }

    /** {@inheritDoc} */
    public function getFileName(Fqsen $fqsen): string
    {
        return $fqsen->getName();
    }

    /**
     * Renders a view file as a PHP script.
     * @param string $file
     * @param array $params
     * @return string
     * @throws \Throwable
     */
    protected function renderFile(string $file, array $params = []): string
    {
        $_obInitialLevel_ = ob_get_level();
        ob_start();
        ob_implicit_flush(0);
        extract($params, EXTR_OVERWRITE);
        try {
            if (!$this->fs->isAbsolutePath($file)) {
                $file = $this->getViewsDir() . DIRECTORY_SEPARATOR . $file;
            }

            if (!$this->fs->exists($file)) {
                throw new IOException('View file ' . $file . ' does not exist');
            }

            include $file;
            return ob_get_clean();
        } catch (\Throwable $e) {
            while (ob_get_level() > $_obInitialLevel_) {
                if (!@ob_end_clean()) {
                    ob_clean();
                }
            }
            throw $e;
        }
    }

    /** {@inheritDoc} */
    public function renderInterfaces(InterfaceElement $interface): string
    {
        throw new RuntimeException('Successor renderer must implement ' . __FUNCTION__ . '() method');
    }

    /** {@inheritDoc} */
    public function renderClasses(ClassElement $interface): string
    {
        throw new RuntimeException('Successor renderer must implement ' . __FUNCTION__ . '() method');
    }
}
