<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\ApiDoc\Element\DocBlock\Factory\DocBlockFactoryInterface;
use spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported;

abstract class AbstractDocBlockResolver implements DocBlockResolverInterface
{
    /**
     * @var DocBlockFactoryInterface
     */
    protected $docBlockFactory;

    /**
     * DocBlockResolver constructor.
     * @param DocBlockFactoryInterface $docBlockFactory
     */
    public function __construct(DocBlockFactoryInterface $docBlockFactory)
    {
        $this->docBlockFactory = $docBlockFactory;
    }

    /**
     * @inheritDoc
     */
    final public function resolve(object $reflection): DocBlock
    {
        if (!$this->supports($reflection)) {
            throw GivenReflectionNotSupported::byDocBlockResolver($reflection);
        }

        return $this->doResolve($reflection);
    }

    /**
     * @param object $reflection
     * @return DocBlock
     */
    protected function doResolve(object $reflection): DocBlock
    {
        $docBlock = $this->docBlockFactory->make($reflection);

        if (!$docBlock->hasInheritTag()) {
            return $docBlock;
        }

        foreach ($this->getParentReflection($reflection) as $parentReflection) {
            $docBlock = $this->mergeDocBlocks($docBlock, $this->resolve($parentReflection));
        }

        return $docBlock;
    }

    /**
     * Returns parent reflection
     * @param object $reflection
     * @return iterable<object>
     * @codeCoverageIgnore
     */
    protected function getParentReflection(object $reflection): iterable
    {
        return [];
    }

    /**
     * Returns list of tag names to inherit
     * @see https://docs.phpdoc.org/latest/guide/guides/inheritance.html
     * @return string[]
     * @codeCoverageIgnore
     */
    protected function getInheritTagNames(): array
    {
        return [];
    }

    final protected function mergeDocBlocks(DocBlock $child, DocBlock $parent): DocBlock
    {
        return (new DocBlockMerger($this->getInheritTagNames()))($child, $parent);
    }
}
