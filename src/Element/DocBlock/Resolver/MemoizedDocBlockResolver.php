<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;

final class MemoizedDocBlockResolver implements DocBlockResolverInterface
{
    /**
     * @var DocBlockResolverInterface
     */
    private $resolver;
    /**
     * @var \SplObjectStorage<object,bool>|bool[]
     */
    private $supportsCache;
    /**
     * @var \SplObjectStorage<object,DocBlock>|DocBlock[]
     */
    private $resolvedCache;

    public function __construct(DocBlockResolverInterface $resolver)
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
    public function resolve(object $reflection): DocBlock
    {
        return $this->resolvedCache[$reflection]
            ?? $this->resolvedCache[$reflection] = $this->resolver->resolve($reflection);
    }
}
