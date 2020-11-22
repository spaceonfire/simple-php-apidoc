<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type\Resolver;

use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Roave\BetterReflection\Reflection\ReflectionFunctionAbstract;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\Type\DisjunctionType;
use spaceonfire\Type\Type;

final class FunctionReturnTypeResolver extends AbstractTypeResolver
{
    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return $reflection instanceof ReflectionFunctionAbstract;
    }

    /**
     * @inheritDoc
     * @param ReflectionFunctionAbstract $reflection
     */
    protected function doResolve(object $reflection, DocBlock $docBlock): ?Type
    {
        if ($reflection instanceof ReflectionMethod) {
            $declaringClass = $reflection->getDeclaringClass();
            $parentClass = $declaringClass->getParentClass();

            if ($this->typeFactory->supports($declaringClass->getName())) {
                $selfReplacement = $this->typeFactory->make($declaringClass->getName());
            }

            if (null !== $parentClass && $this->typeFactory->supports($parentClass->getName())) {
                $parentReplacement = $this->typeFactory->make($parentClass->getName());
            }
        }

        $selfReplacement = $selfReplacement ?? null;
        $parentReplacement = $parentReplacement ?? null;

        $output = [];

        /** @var Return_ $returnTag */
        $returnTag = $docBlock->getFirstTagByName('return');

        if (
            (null !== $returnTag) &&
            (null !== $phpDocType = $returnTag->getType()) &&
            (null !== $t = ($this->phpDocTypeConverter)($phpDocType, $selfReplacement, $parentReplacement))
        ) {
            $output[(string)$t] = $t;
        }

        if (
            (null !== $reflectionType = $reflection->getReturnType()) &&
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
