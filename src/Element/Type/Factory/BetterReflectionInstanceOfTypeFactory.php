<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type\Factory;

use Roave\BetterReflection\Reflector\ClassReflector;
use Roave\BetterReflection\Reflector\Exception\IdentifierNotFound;
use spaceonfire\ApiDoc\Element\Type\BetterReflectionInstanceOfType;
use spaceonfire\Type\Exception\TypeNotSupportedException;
use spaceonfire\Type\Factory\TypeFactoryInterface;
use spaceonfire\Type\Factory\TypeFactoryTrait;
use spaceonfire\Type\Type;

final class BetterReflectionInstanceOfTypeFactory implements TypeFactoryInterface
{
    use TypeFactoryTrait;

    /**
     * @var ClassReflector
     */
    private $reflector;

    /**
     * BetterReflectionInstanceOfTypeFactory constructor.
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
        try {
            $this->reflector->reflect($type);
            return true;
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
            throw new TypeNotSupportedException($type, BetterReflectionInstanceOfType::class);
        }

        $reflectionClass = $this->reflector->reflect($type);
        return new BetterReflectionInstanceOfType($reflectionClass);
    }
}
