<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Link;

use Psr\Http\Message\UriInterface;
use spaceonfire\ApiDoc\Element\ValueObject\LinkInterface;

final class CompositeLinkResolver implements LinkResolverInterface
{
    /**
     * @var LinkResolverInterface[]
     */
    private $resolvers;

    /**
     * CompositeLinkResolver constructor.
     * @param LinkResolverInterface ...$resolvers
     */
    public function __construct(LinkResolverInterface ...$resolvers)
    {
        $this->resolvers = $resolvers;
    }

    /**
     * @inheritDoc
     */
    public function supports(LinkInterface $link): bool
    {
        foreach ($this->resolvers as $resolver) {
            if ($resolver->supports($link)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function resolve(LinkInterface $link, $from = null): UriInterface
    {
        foreach ($this->resolvers as $resolver) {
            if ($resolver->supports($link)) {
                return $resolver->resolve($link, $from);
            }
        }

        throw new \UnexpectedValueException('Cannot resolve link');
    }
}
