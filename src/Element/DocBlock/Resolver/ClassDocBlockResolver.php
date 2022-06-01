<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use Generator;
use Roave\BetterReflection\Reflection\ReflectionClass;

final class ClassDocBlockResolver extends AbstractDocBlockResolver
{
    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return $reflection instanceof ReflectionClass;
    }

    /**
     * @inheritDoc
     * @param ReflectionClass $reflection
     * @return Generator<ReflectionClass>
     */
    protected function getParentReflection(object $reflection): iterable
    {
        if (null !== $parentClass = $reflection->getParentClass()) {
            yield $parentClass;
        }

        foreach ($reflection->getImmediateInterfaces() as $interface) {
            yield $interface;
        }
    }

    /**
     * @inheritDoc
     */
    protected function getInheritTagNames(): array
    {
        return [
            'author',
            'copyright',
            'package',
            'subpackage',
            'version',
            'method',
            'property',
        ];
    }
}
