<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type;

use Roave\BetterReflection\Reflection\ReflectionClass;
use RuntimeException;
use spaceonfire\Type\Type;

final class BetterReflectionInstanceOfType implements Type
{
    /**
     * @var ReflectionClass
     */
    private $reflectionClass;

    /**
     * BetterReflectionInstanceOfType constructor.
     * @param ReflectionClass $reflectionClass
     */
    public function __construct(ReflectionClass $reflectionClass)
    {
        $this->reflectionClass = $reflectionClass;
    }

    /**
     * @inheritDoc
     */
    public function check($_): bool
    {
        throw new RuntimeException(self::class . ' type cannot be checked');
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->reflectionClass->getName();
    }
}
