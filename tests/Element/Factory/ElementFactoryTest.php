<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Factory;

use phpDocumentor\Reflection\DocBlock\Tags\Example;
use phpDocumentor\Reflection\DocBlockFactory as PhpDocumentorDocBlockFactory;
use PHPUnit\Framework\TestCase;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\Reflector;
use spaceonfire\ApiDoc\_Fixtures\Php72\ExampleChildClass;
use spaceonfire\ApiDoc\Element\DocBlock\Factory\DocBlockFactory;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\ClassDocBlockResolver;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\CompositeDocBlockResolver;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\DefaultDocBlockResolver;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\MethodDocBlockResolver;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\PropertyDocBlockResolver;
use spaceonfire\ApiDoc\Element\ClassElement;
use spaceonfire\ApiDoc\Element\Location\LocationFactory;
use spaceonfire\ApiDoc\Element\Type\Factory\BetterReflectionInstanceOfTypeFactory;
use spaceonfire\ApiDoc\Element\Type\Factory\BetterReflectionParentFactory;
use spaceonfire\Type\Factory\BuiltinTypeFactory;
use spaceonfire\Type\Factory\CollectionTypeFactory;
use spaceonfire\Type\Factory\CompositeTypeFactory;
use spaceonfire\Type\Factory\ConjunctionTypeFactory;
use spaceonfire\Type\Factory\DisjunctionTypeFactory;
use spaceonfire\Type\Factory\GroupTypeFactory;
use spaceonfire\Type\Factory\MixedTypeFactory;
use spaceonfire\Type\Factory\VoidTypeFactory;
use stdClass;

class ElementFactoryTest extends TestCase
{
    private $initialized = false;
    /**
     * @var CompositeElementFactory
     */
    private $factory;
    /**
     * @var Reflector
     */
    private $reflector;

    protected function setUp(): void
    {
        if ($this->initialized) {
            return;
        }

        $this->reflector = (new BetterReflection())->classReflector();

        $docBlockFactory = new DocBlockFactory(PhpDocumentorDocBlockFactory::createInstance([
            'example' => Example::class,
        ]));
        $resolver = new CompositeDocBlockResolver(
            new ClassDocBlockResolver($docBlockFactory),
            new MethodDocBlockResolver($docBlockFactory),
            new PropertyDocBlockResolver($docBlockFactory),
            new DefaultDocBlockResolver($docBlockFactory)
        );

        $typeFactory = new CompositeTypeFactory(...[
            new CollectionTypeFactory(),
            new GroupTypeFactory(),
            new ConjunctionTypeFactory(),
            new DisjunctionTypeFactory(),
            new BetterReflectionInstanceOfTypeFactory($this->reflector),
            new BetterReflectionParentFactory($this->reflector),
            new BuiltinTypeFactory(),
            new MixedTypeFactory(),
            new VoidTypeFactory(),
        ]);

        $locationFactory = new LocationFactory([dirname(__DIR__, 2) . '/_Fixtures']);

        $this->factory = new CompositeElementFactory(
            new ClassLikeElementFactory($resolver, $typeFactory, $locationFactory),
            new ConstantElementFactory($resolver, $typeFactory, $locationFactory),
            new FunctionLikeElementFactory($resolver, $typeFactory, $locationFactory),
            new PropertyElementFactory($resolver, $typeFactory, $locationFactory)
        );

        $this->initialized = true;
    }

    /**
     * @dataProvider supportsDataProvider()
     * @param ElementFactoryInterface $factory
     * @param object $reflection
     * @param bool $expected
     */
    public function testSupports(ElementFactoryInterface $factory, object $reflection, bool $expected): void
    {
        self::assertSame($expected, $factory->supports($reflection));
    }

    public function supportsDataProvider(): array
    {
        $this->setUp();

        return [
            [
                $this->factory,
                $this->reflector->reflect(ExampleChildClass::class),
                true,
            ],
            [
                $this->factory,
                new stdClass(),
                false,
            ],
        ];
    }

    public function testMakeExampleChildClass(): void
    {
        /** @var ClassElement $element */
        $element = $this->factory->make($this->reflector->reflect(ExampleChildClass::class));
        self::assertInstanceOf(ClassElement::class, $element);
        self::assertSame(ExampleChildClass::class, $element->name->getName());

        $expectedConstants = ['PUBLIC_CONST', 'PROTECTED_CONST', 'PRIVATE_CONST', 'CONST'];
        self::assertCount(count($expectedConstants), $element->constants);
        foreach ($element->constants as $constant) {
            self::assertContains($constant->name->withoutClassName(), $expectedConstants);
        }

        $expectedProperties = ['$propertyFromClass', '$propertyFromTrait', '$propertyFromChildClass'];
        self::assertCount(count($expectedProperties), $element->properties);
        foreach ($element->properties as $property) {
            self::assertContains($property->name->withoutClassName(), $expectedProperties);
        }

        $expectedMethods = ['method', 'noParent', 'traitMethod', '__call'];
        self::assertCount(count($expectedMethods), $element->methods);
        foreach ($element->methods as $method) {
            self::assertContains($method->name->withoutClassName(), $expectedMethods);
        }

        $expectedMagicProperties = ['$propertyA', '$propertyB', '$propertyC'];
        self::assertCount(count($expectedMagicProperties), $element->magicProperties);
        foreach ($element->magicProperties as $magicProperty) {
            self::assertContains($magicProperty->name->withoutClassName(), $expectedMagicProperties);
        }

        $expectedMagicMethods = ['methodA', 'methodB', 'methodC'];
        self::assertCount(count($expectedMagicMethods), $element->magicMethods);
        foreach ($element->magicMethods as $magicMethod) {
            self::assertContains($magicMethod->name->withoutClassName(), $expectedMagicMethods);
        }
        // TODO: write asserts to full expected state of generated $element
    }
}
