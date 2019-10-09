<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Renderers;

use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Php\Class_;
use phpDocumentor\Reflection\Php\Interface_;
use spaceonfire\SimplePhpApiDoc\Context;
use spaceonfire\SimplePhpApiDoc\Elements\ClassElement;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

interface RendererInterface
{
    /**
     * Render documentation
     */
    public function run(): void;

    /**
     * Generates file name with extension
     * @param Fqsen $fqsen
     * @return string
     */
    public function getFileName(Fqsen $fqsen): string;

    /**
     * Render documentation content for interface
     * @param Interface_ $interface
     * @return string
     */
    public function renderInterfaces(Interface_ $interface): string;

    /**
     * Render documentation content for class
     * @param ClassElement $interface
     * @return string
     */
    public function renderClasses(ClassElement $interface): string;


    /**
     * Getter for `context` property
     * @return Context
     */
    public function getContext(): Context;

    /**
     * Setter for `context` property
     * @param Context $context
     * @return static
     */
    public function setContext(Context $context): RendererInterface;

    /**
     * Getter for `outputDir` property
     * @return string
     */
    public function getOutputDir(): string;

    /**
     * Setter for `outputDir` property
     * @param string $outputDir
     * @return static
     */
    public function setOutputDir(string $outputDir): RendererInterface;

    /**
     * Getter for `viewsDir` property
     * @return string
     */
    public function getViewsDir(): string;

    /**
     * Setter for `viewsDir` property
     * @param string $viewsDir
     * @return static
     */
    public function setViewsDir(string $viewsDir): RendererInterface;

    /**
     * Getter for `fs` property
     * @return Filesystem
     */
    public function getFs(): Filesystem;

    /**
     * Setter for `fs` property
     * @param Filesystem $fs
     * @return static
     */
    public function setFs(Filesystem $fs): RendererInterface;

    /**
     * Getter for `output` property
     * @return OutputInterface
     */
    public function getOutput(): OutputInterface;

    /**
     * Setter for `output` property
     * @param OutputInterface $output
     * @return static
     */
    public function setOutput(OutputInterface $output): RendererInterface;
}
