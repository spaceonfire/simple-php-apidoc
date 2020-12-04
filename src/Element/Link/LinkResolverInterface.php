<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Link;

use Psr\Http\Message\UriInterface;
use spaceonfire\ApiDoc\Element\ValueObject\LinkInterface;

interface LinkResolverInterface
{
    /**
     * @param LinkInterface $link
     * @return bool
     */
    public function supports(LinkInterface $link): bool;

    /**
     * @param LinkInterface $link
     * @param mixed|null $from
     * @return UriInterface
     */
    public function resolve(LinkInterface $link, $from = null): UriInterface;
}
