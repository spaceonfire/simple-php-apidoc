<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Render\Twig;

use spaceonfire\ApiDoc\Element\Example\ExampleCodeSnippetResolver;
use spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet;
use spaceonfire\ApiDoc\Element\ValueObject\Example;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class ExampleRendererExtension extends AbstractExtension
{
    /**
     * @var ExampleCodeSnippetResolver
     */
    private $exampleCodeSnippetResolver;

    public function __construct(ExampleCodeSnippetResolver $exampleCodeSnippetResolver)
    {
        $this->exampleCodeSnippetResolver = $exampleCodeSnippetResolver;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('example_code_snippet', [$this, 'exampleCodeSnippet']),
        ];
    }

    public function exampleCodeSnippet(Example $example): ?CodeSnippet
    {
        if (false === $this->exampleCodeSnippetResolver->supports($example)) {
            return null;
        }

        return $example->resolveCodeSnippet($this->exampleCodeSnippetResolver);
    }
}
