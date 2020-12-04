<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Link;

use Psr\Http\Message\UriInterface;
use spaceonfire\ApiDoc\Element\ValueObject\ExternalLink;
use spaceonfire\ApiDoc\Element\ValueObject\LinkInterface;

final class ExternalLinkResolver implements LinkResolverInterface
{
    /**
     * @inheritDoc
     */
    public function supports(LinkInterface $link): bool
    {
        return $link instanceof ExternalLink;
    }

    /**
     * @inheritDoc
     * @param ExternalLink $link
     */
    public function resolve(LinkInterface $link, $_ = null): UriInterface
    {
        return $link->getTarget();
    }
}
