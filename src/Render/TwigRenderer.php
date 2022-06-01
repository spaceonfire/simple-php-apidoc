<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Render;

use spaceonfire\ApiDoc\Element\ElementInterface;
use Twig\Environment;

final class TwigRenderer implements RendererInterface
{
    /**
     * @var Environment
     */
    private $twig;
    /**
     * @var TemplateNameStrategyInterface
     */
    private $templateNameStrategy;
    /**
     * @var array<string,mixed>
     */
    private $defaultContext;

    /**
     * TwigRenderer constructor.
     * @param Environment $twig
     * @param TemplateNameStrategyInterface $templateNameStrategy
     * @param array<string,mixed> $defaultContext
     */
    public function __construct(
        Environment $twig,
        TemplateNameStrategyInterface $templateNameStrategy,
        array $defaultContext = []
    ) {
        $this->twig = $twig;
        $this->templateNameStrategy = $templateNameStrategy;
        $this->defaultContext = $defaultContext;
    }

    /**
     * @inheritDoc
     */
    public function supports(ElementInterface $element): bool
    {
        return $this->templateNameStrategy->has(get_class($element));
    }

    /**
     * @inheritDoc
     */
    public function render(ElementInterface $element, array $context = []): string
    {
        return $this->twig->render(
            $this->templateNameStrategy->get(get_class($element)),
            array_merge($this->defaultContext, $context, [
                'element' => $element,
            ])
        );
    }
}
