<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionMethod;

final class MethodDocBlockResolver extends AbstractDocBlockResolver
{
    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return $reflection instanceof ReflectionMethod;
    }

    /**
     * @inheritDoc
     * @param ReflectionMethod $reflection
     * @return ReflectionMethod[]
     */
    protected function getParentReflection(object $reflection): iterable
    {
        $methodName = $reflection->getShortName();
        $class = $reflection->getDeclaringClass();
        $parentClass = $class->getParentClass();

        if (null !== $parentClass && $parentClass->hasMethod($methodName)) {
            return [$parentClass->getMethod($methodName)];
        }

        /** @var ReflectionClass $interface */
        foreach ($class->getImmediateInterfaces() as $interface) {
            if ($interface->hasMethod($methodName)) {
                return [$interface->getMethod($methodName)];
            }
        }

        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getInheritTagNames(): array
    {
        return [
            'author',
            'copyright',
            'version',
            'param',
            'return',
            'throws',
        ];
    }
}
