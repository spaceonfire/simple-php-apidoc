<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\ServiceProviders;

use spaceonfire\ApiDoc\Element\ClassElement;
use spaceonfire\ApiDoc\Element\ConstantsAggregate;
use spaceonfire\ApiDoc\Element\FunctionsAggregate;
use spaceonfire\ApiDoc\Element\InterfaceElement;
use spaceonfire\ApiDoc\Element\TableOfContentsElement;
use spaceonfire\ApiDoc\Element\TraitElement;
use spaceonfire\ApiDoc\Render\RendererInterface;
use spaceonfire\ApiDoc\Render\StaticListTemplateNameStrategy;
use spaceonfire\ApiDoc\Render\TwigRenderer;
use spaceonfire\Container\ServiceProvider\AbstractServiceProvider;
use Twig\Environment;

final class DefaultRendererProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function provides(): array
    {
        return [
            RendererInterface::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->getContainer()->add(RendererInterface::class, TwigRenderer::class);

        $this->getContainer()->add(TwigRenderer::class, function (Environment $twig) {
            // TODO: configure template name strategy
            return new TwigRenderer($twig, new StaticListTemplateNameStrategy([
                ClassElement::class => 'class.md.twig',
                InterfaceElement::class => 'interface.md.twig',
                TraitElement::class => 'trait.md.twig',
                FunctionsAggregate::class => 'functions.md.twig',
                ConstantsAggregate::class => 'constants.md.twig',
                TableOfContentsElement::class => 'toc.md.twig',
            ]));
        });
    }
}
