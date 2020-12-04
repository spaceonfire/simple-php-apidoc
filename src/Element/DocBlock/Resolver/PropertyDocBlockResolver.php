<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionProperty;

final class PropertyDocBlockResolver extends AbstractDocBlockResolver
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
     * @return ReflectionProperty[]
     */
    protected function getParentReflection(object $reflection): iterable
    {
        $propertyName = $reflection->getName();
        $class = $reflection->getDeclaringClass();
        $parentClass = $class->getParentClass();

        if (null !== $parentClass && null !== $property = $parentClass->getProperty($propertyName)) {
            return [$property];
        }

        /** @var ReflectionClass $trait */
        foreach ($class->getTraits() as $trait) {
            if (null !== $property = $trait->getProperty($propertyName)) {
                return [$property];
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
            'var',
        ];
    }
}
