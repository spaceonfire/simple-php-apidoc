<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type\Factory;

use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\ClassReflector;
use Roave\BetterReflection\Reflector\Exception\IdentifierNotFound;
use spaceonfire\ApiDoc\Element\Type\BetterReflectionInstanceOfType;
use spaceonfire\Type\Exception\TypeNotSupportedException;
use spaceonfire\Type\Factory\TypeFactoryInterface;
use spaceonfire\Type\Factory\TypeFactoryTrait;
use spaceonfire\Type\Type;

final class BetterReflectionParentFactory implements TypeFactoryInterface
{
    use TypeFactoryTrait;

    /**
     * @var ClassReflector
     */
    private $reflector;

    /**
     * BetterReflectionParentFactory constructor.
     * @param ClassReflector $reflector
     */
    public function __construct(ClassReflector $reflector)
    {
        $this->reflector = $reflector;
    }

    /**
     * @inheritDoc
     */
    public function supports(string $type): bool
    {
        if (!str_starts_with($type, 'parent:')) {
            return false;
        }

        $className = substr($type, 7);

        try {
            $classReflection = $this->reflector->reflect($className);
            return null !== $classReflection->getParentClass();
        } catch (IdentifierNotFound $e) {
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function make(string $type): Type
    {
        if (!$this->supports($type)) {
            throw new TypeNotSupportedException($type);
        }

        $className = substr($type, 7);
        $classReflection = $this->reflector->reflect($className);
        /** @var ReflectionClass $parentClassReflection */
        $parentClassReflection = $classReflection->getParentClass();
        return new BetterReflectionInstanceOfType($parentClassReflection);
    }
}
