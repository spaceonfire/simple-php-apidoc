<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type\Converter;

use Roave\BetterReflection\Reflection\ReflectionType;
use spaceonfire\Type\BuiltinType;
use spaceonfire\Type\DisjunctionType;
use spaceonfire\Type\Factory\TypeFactoryInterface;
use spaceonfire\Type\Type;

final class ReflectionTypeConverter
{
    /**
     * @var TypeFactoryInterface
     */
    private $typeFactory;

    public function __construct(TypeFactoryInterface $typeFactory)
    {
        $this->typeFactory = $typeFactory;
    }

    public function __invoke(
        ReflectionType $type,
        ?Type $selfReplacement = null,
        ?Type $parentReplacement = null
    ): ?Type {
        $output = null;

        switch ($type->getName()) {
            case 'self':
            case 'static':
            case '$this':
                $output = $selfReplacement;
                break;

            case 'parent':
                $output = $parentReplacement;
                break;

            default:
                if ($this->typeFactory->supports($type->getName())) {
                    $output = $this->typeFactory->make($type->getName());
                }
                break;
        }

        if (null === $output) {
            return null;
        }

        if ($type->allowsNull()) {
            return new DisjunctionType([
                $output,
                new BuiltinType(BuiltinType::NULL),
            ]);
        }

        return $output;
    }
}
