<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type\Resolver;

use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\ApiDoc\Element\Type\Converter\PhpDocTypeConverter;
use spaceonfire\ApiDoc\Element\Type\Converter\ReflectionTypeConverter;
use spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported;
use spaceonfire\Type\Factory\TypeFactoryInterface;
use spaceonfire\Type\Type;

abstract class AbstractTypeResolver implements TypeResolverInterface
{
    /**
     * @var TypeFactoryInterface
     */
    protected $typeFactory;
    /**
     * @var PhpDocTypeConverter
     */
    protected $phpDocTypeConverter;
    /**
     * @var ReflectionTypeConverter
     */
    protected $reflectionTypeConverter;

    /**
     * TypeResolver constructor.
     * @param TypeFactoryInterface $typeFactory
     */
    public function __construct(TypeFactoryInterface $typeFactory)
    {
        $this->typeFactory = $typeFactory;
        $this->phpDocTypeConverter = new PhpDocTypeConverter($typeFactory);
        $this->reflectionTypeConverter = new ReflectionTypeConverter($typeFactory);
    }

    /**
     * @inheritDoc
     */
    final public function resolve(object $reflection, DocBlock $docBlock): ?Type
    {
        if (!$this->supports($reflection)) {
            throw GivenReflectionNotSupported::forReason($reflection);
        }

        return $this->doResolve($reflection, $docBlock);
    }

    /**
     * @param object $reflection
     * @param DocBlock $docBlock
     * @return Type|null
     */
    abstract protected function doResolve(object $reflection, DocBlock $docBlock): ?Type;
}
