<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type\Resolver;

use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported;
use spaceonfire\Type\Type;

final class CompositeTypeResolver implements TypeResolverInterface
{
    /**
     * @var TypeResolverInterface[]
     */
    private $resolvers;

    /**
     * CompositeTypeResolver constructor.
     * @param TypeResolverInterface ...$resolvers
     */
    public function __construct(TypeResolverInterface ...$resolvers)
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
    public function resolve(object $reflection, DocBlock $docBlock): ?Type
    {
        foreach ($this->resolvers as $resolver) {
            if ($resolver->supports($reflection)) {
                return $resolver->resolve($reflection, $docBlock);
            }
        }

        throw GivenReflectionNotSupported::forReason($reflection);
    }
}
