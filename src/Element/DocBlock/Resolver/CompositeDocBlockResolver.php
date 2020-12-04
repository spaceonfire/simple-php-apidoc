<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported;

final class CompositeDocBlockResolver implements DocBlockResolverInterface
{
    /**
     * @var DocBlockResolverInterface[]
     */
    private $resolvers;

    public function __construct(DocBlockResolverInterface ...$resolvers)
    {
        $this->resolvers = $resolvers;
    }

    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        foreach ($this->resolvers as $resolver) {
            if ($resolver->supports($reflection)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function resolve(object $reflection): DocBlock
    {
        foreach ($this->resolvers as $resolver) {
            if ($resolver->supports($reflection)) {
                return $resolver->resolve($reflection);
            }
        }

        throw GivenReflectionNotSupported::byDocBlockResolver($reflection);
    }
}
