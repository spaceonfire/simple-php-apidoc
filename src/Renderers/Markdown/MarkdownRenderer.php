<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Renderers\Markdown;

use phpDocumentor\Reflection\Fqsen;
use spaceonfire\SimplePhpApiDoc\Context;
use spaceonfire\SimplePhpApiDoc\Elements\ClassElement;
use spaceonfire\SimplePhpApiDoc\Elements\InterfaceElement;
use spaceonfire\SimplePhpApiDoc\Elements\TraitElement;
use spaceonfire\SimplePhpApiDoc\Renderers\BaseRenderer;
use Throwable;

/**
 * Class MarkdownRenderer
 *
 * Renders documentation for your code in markdown format
 *
 * @package spaceonfire\SimplePhpApiDoc\Renderers\Markdown
 */
class MarkdownRenderer extends BaseRenderer
{
    /**
     * MarkdownRenderer constructor.
     * @param Context|null $context
     * @param string|null $outputDir
     */
    public function __construct(Context $context = null, string $outputDir = null)
    {
        parent::__construct($context, $outputDir);
        $this->setViewsDir(__DIR__ . '/views');
    }

    /** {@inheritDoc} */
    public function getFileName(Fqsen $fqsen): string
    {
        return $fqsen->getName() . '.md';
    }

    /**
     * {@inheritDoc}
     * @throws Throwable
     */
    public function renderInterfaces(InterfaceElement $interface): string
    {
        return $this->renderFile('interface.php', compact('interface'));
    }

    /**
     * {@inheritDoc}
     * @throws Throwable
     */
    public function renderClasses(ClassElement $class): string
    {
        return $this->renderFile('class.php', compact('class'));
    }

    /**
     * {@inheritDoc}
     * @throws Throwable
     */
    public function renderTraits(TraitElement $trait): string
    {
        return $this->renderFile('trait.php', compact('trait'));
    }
}
