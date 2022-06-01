<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type\Resolver;

use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\Type\Type;

final class MemoizedTypeResolver implements TypeResolverInterface
{
    /**
     * @var TypeResolverInterface
     */
    private $resolver;
    /**
     * @var \SplObjectStorage<object,bool>|bool[]
     */
    private $supportsCache;
    /**
     * @var \SplObjectStorage<object,Type>|Type[]
     */
    private $resolvedCache;

    public function __construct(TypeResolverInterface $resolver)
    {
        $this->resolver = $resolver;
        $this->supportsCache = new \SplObjectStorage();
        $this->resolvedCache = new \SplObjectStorage();
    }

    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return $this->supportsCache[$reflection]
            ?? $this->supportsCache[$reflection] = $this->resolver->supports($reflection);
    }

    /**
     * @inheritDoc
     */
    public function resolve(object $reflection, DocBlock $docBlock): ?Type
    {
        return $this->resolvedCache[$reflection]
            ?? $this->resolvedCache[$reflection] = $this->resolver->resolve($reflection, $docBlock);
    }
}
