<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type\Converter;

use phpDocumentor\Reflection\PseudoType;
use phpDocumentor\Reflection\Type as PhpDocumentorType;
use phpDocumentor\Reflection\Types\AbstractList;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\ClassString;
use phpDocumentor\Reflection\Types\Collection;
use phpDocumentor\Reflection\Types\Compound;
use phpDocumentor\Reflection\Types\Intersection;
use phpDocumentor\Reflection\Types\Iterable_;
use phpDocumentor\Reflection\Types\Nullable;
use phpDocumentor\Reflection\Types\Parent_;
use phpDocumentor\Reflection\Types\Self_;
use phpDocumentor\Reflection\Types\Static_;
use spaceonfire\ApiDoc\Exception\TypeCannotBeConverted;
use spaceonfire\Type\BuiltinType;
use spaceonfire\Type\CollectionType;
use spaceonfire\Type\ConjunctionType;
use spaceonfire\Type\DisjunctionType;
use spaceonfire\Type\Factory\TypeFactoryInterface;
use spaceonfire\Type\Type;

final class PhpDocTypeConverter
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
        PhpDocumentorType $type,
        ?Type $selfReplacement = null,
        ?Type $parentReplacement = null
    ): ?Type {
        return $this->convert($type, $selfReplacement, $parentReplacement);
    }

    public function convert(
        PhpDocumentorType $type,
        ?Type $selfReplacement = null,
        ?Type $parentReplacement = null
    ): ?Type {
        if ($type instanceof Compound) {
            $items = [];
            foreach ($type as $subType) {
                $t = $this->convert($subType, $selfReplacement, $parentReplacement);
                $items[(string)$t] = $t;
            }
            $items = array_values(array_filter($items));

            if (count($items) > 1) {
                return new DisjunctionType($items);
            }

            if (1 === count($items)) {
                return $items[0];
            }

            throw new TypeCannotBeConverted($type);
        }

        if ($type instanceof Intersection) {
            $items = [];
            foreach ($type as $subType) {
                $t = $this->convert($subType, $selfReplacement, $parentReplacement);
                $items[(string)$t] = $t;
            }
            $items = array_values(array_filter($items));

            if (count($items) > 1) {
                return new ConjunctionType($items);
            }

            if (1 === count($items)) {
                return $items[0];
            }

            throw new TypeCannotBeConverted($type);
        }

        if ($type instanceof AbstractList) {
            $valueType = $this->convert($type->getValueType(), $selfReplacement, $parentReplacement);

            if (null === $valueType) {
                throw new TypeCannotBeConverted($type);
            }

            $keyType = (function () {
                if (property_exists($this, 'keyType')) {
                    return $this->keyType;
                }

                /** @var AbstractList $this */
                return $this->getKeyType();
            })->call($type);
            $keyType = $keyType ? $this->convert($keyType, $selfReplacement, $parentReplacement) : null;

            if ($type instanceof Array_) {
                $iterableType = new BuiltinType(BuiltinType::ARRAY);
            } elseif ($type instanceof Iterable_) {
                $iterableType = new BuiltinType(BuiltinType::ITERABLE);
            } elseif ($type instanceof Collection) {
                if (null !== $type->getFqsen() && $this->typeFactory->supports((string)$type->getFqsen())) {
                    $iterableType = $this->typeFactory->make((string)$type->getFqsen());
                }
            }

            return new CollectionType($valueType, $keyType, $iterableType ?? null);
        }

        if ($type instanceof Nullable) {
            $actualType = $this->convert($type->getActualType(), $selfReplacement, $parentReplacement);

            if (null === $actualType) {
                throw new TypeCannotBeConverted($type);
            }

            return new DisjunctionType([
                $actualType,
                new BuiltinType(BuiltinType::NULL),
            ]);
        }

        if ($type instanceof ClassString) {
            return new BuiltinType(BuiltinType::STRING);
        }

        if (
            $type instanceof \phpDocumentor\Reflection\Types\This ||
            $type instanceof Self_ ||
            $type instanceof Static_
        ) {
            if (null === $selfReplacement) {
                throw new TypeCannotBeConverted($type);
            }

            return $selfReplacement;
        }

        if ($type instanceof Parent_) {
            if (null === $parentReplacement) {
                throw new TypeCannotBeConverted($type);
            }

            return $parentReplacement;
        }

        if ($type instanceof PseudoType) {
            $type = $type->underlyingType();
        }

        if (!$this->typeFactory->supports((string)$type)) {
            return null;
        }

        return $this->typeFactory->make((string)$type);
    }
}
