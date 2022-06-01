<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type\Resolver;

use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Roave\BetterReflection\Reflection\ReflectionProperty;
use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\Type\DisjunctionType;
use spaceonfire\Type\Type;

final class PropertyTypeResolver extends AbstractTypeResolver
{
    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return $reflection instanceof ReflectionProperty;
    }

    /**
     * @inheritDoc
     * @param ReflectionProperty $reflection
     */
    protected function doResolve(object $reflection, DocBlock $docBlock): ?Type
    {
        $declaringClass = $reflection->getDeclaringClass();
        $parentClass = $declaringClass->getParentClass();

        if ($this->typeFactory->supports($declaringClass->getName())) {
            $selfReplacement = $this->typeFactory->make($declaringClass->getName());
        } else {
            $selfReplacement = null;
        }

        if (null !== $parentClass && $this->typeFactory->supports($parentClass->getName())) {
            $parentReplacement = $this->typeFactory->make($parentClass->getName());
        } else {
            $parentReplacement = null;
        }

        $output = [];

        /** @var Var_ $varTag */
        $varTag = $docBlock->getFirstTagByName('var');

        if (
            (null !== $varTag) &&
            (null !== $phpDocType = $varTag->getType()) &&
            (null !== $t = ($this->phpDocTypeConverter)($phpDocType, $selfReplacement, $parentReplacement))
        ) {
            $output[(string)$t] = $t;
        }

        if (
            (null !== $reflectionType = $reflection->getType()) &&
            (null !== $t = ($this->reflectionTypeConverter)($reflectionType, $selfReplacement, $parentReplacement))
        ) {
            $output[(string)$t] = $t;
        }

        $output = array_values($output);

        if (0 === count($output)) {
            return null;
        }

        if (1 === count($output)) {
            return $output[0];
        }

        return new DisjunctionType($output);
    }
}
