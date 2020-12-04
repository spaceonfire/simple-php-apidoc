<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type\Resolver;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use Roave\BetterReflection\Reflection\ReflectionParameter;
use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\Collection\Collection;
use spaceonfire\Type\DisjunctionType;
use spaceonfire\Type\Type;

final class ArgumentTypeResolver extends AbstractTypeResolver
{
    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return $reflection instanceof ReflectionParameter;
    }

    /**
     * @inheritDoc
     * @param ReflectionParameter $reflection
     */
    protected function doResolve(object $reflection, DocBlock $docBlock): ?Type
    {
        $declaringClass = $reflection->getDeclaringClass();
        $parentClass = $declaringClass ? $declaringClass->getParentClass() : null;

        if (null !== $declaringClass && $this->typeFactory->supports($declaringClass->getName())) {
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

        /** @var Param[] $paramTags */
        $paramTags = (new Collection($docBlock->getTagsByName('param')))
            ->indexBy(function (Param $param) {
                return $param->getVariableName();
            });

        $paramTag = $paramTags[$reflection->getName()] ?? null;

        if (
            (null !== $paramTag) &&
            (null !== $phpDocType = $paramTag->getType()) &&
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
