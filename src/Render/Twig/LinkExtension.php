<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Render\Twig;

use spaceonfire\ApiDoc\Element\Link\AnchorGenerator;
use spaceonfire\ApiDoc\Element\Link\LinkResolverInterface;
use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;
use spaceonfire\ApiDoc\Element\ValueObject\LinkInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class LinkExtension extends AbstractExtension
{
    /**
     * @var LinkResolverInterface
     */
    private $linkResolver;
    /**
     * @var AnchorGenerator
     */
    private $anchorGenerator;

    public function __construct(LinkResolverInterface $linkResolver)
    {
        $this->linkResolver = $linkResolver;
        $this->anchorGenerator = new AnchorGenerator();
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('anchor', [$this, 'anchor']),
            new TwigFunction('resolve_link', [$this, 'resolveLink']),
        ];
    }

    public function anchor(Fqsen $fqsen): string
    {
        return ($this->anchorGenerator)($fqsen);
    }

    /**
     * @param LinkInterface $link
     * @param mixed|null $from
     * @return string
     */
    public function resolveLink(LinkInterface $link, $from = null): string
    {
        return (string)$this->linkResolver->resolve($link, $from);
    }
}
