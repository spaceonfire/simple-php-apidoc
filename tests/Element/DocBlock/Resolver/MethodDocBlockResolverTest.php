<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use phpDocumentor\Reflection\DocBlockFactory as PhpDocumentorDocBlockFactory;
use PHPUnit\Framework\TestCase;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\ClassReflector;
use spaceonfire\ApiDoc\_Fixtures\Php72\ExampleChildClass;
use spaceonfire\ApiDoc\Element\DocBlock\Factory\DocBlockFactory;

class MethodDocBlockResolverTest extends TestCase
{
    /**
     * @var MethodDocBlockResolver
     */
    private $resolver;
    /**
     * @var ClassReflector
     */
    private $reflector;
    /**
     * @var bool
     */
    private $initialized = false;

    protected function setUp(): void
    {
        if ($this->initialized) {
            return;
        }

        $this->resolver = new MethodDocBlockResolver(new DocBlockFactory(PhpDocumentorDocBlockFactory::createInstance()));
        $this->reflector = (new BetterReflection())->classReflector();

        $this->initialized = true;
    }

    public function testSupports(): void
    {
        self::assertTrue(
            $this->resolver->supports(
                $this->reflector->reflect(ExampleChildClass::class)->getMethod('method')
            )
        );
        self::assertFalse($this->resolver->supports($this->reflector->reflect(ExampleChildClass::class)));
    }

    public function testResolve(): void
    {
        $docBlock = $this->resolver->resolve(
            $this->reflector->reflect(ExampleChildClass::class)->getMethod('method')
        );

        self::assertSame('Child Summary', $docBlock->getSummary());
        self::assertSame("Child before inheritDoc\n\nDefault Description\nParent after inheritDoc\n\nChild after inheritDoc", $docBlock->getDescription());

        self::assertCount(3, $docBlock->getTagsByName('param'));
        $expectedParams = ['name', 'parentArgument', 'childArgument'];
        foreach ($docBlock->getTagsByName('param') as $tag) {
            self::assertContains($tag->getVariableName(), $expectedParams);

            switch ($tag->getVariableName()) {
                case 'name':
                    self::assertSame('overridden in child argument description', (string)$tag->getDescription());
                    break;

                case 'parentArgument':
                    self::assertSame('parent argument description', (string)$tag->getDescription());
                    break;

                case 'childArgument':
                    self::assertSame('additional argument from child class', (string)$tag->getDescription());
                    break;
            }
        }

        self::assertCount(1, $docBlock->getTagsByName('return'));
        self::assertSame('returned value description', (string)$docBlock->getFirstTagByName('return')->getDescription());

        self::assertCount(3, $docBlock->getTagsByName('throws'));

        self::assertCount(1, $docBlock->getTagsByName('author'));
        self::assertSame('Child Author', $docBlock->getFirstTagByName('author')->getAuthorName());

        self::assertCount(1, $docBlock->getTagsByName('copyright'));
        self::assertSame('child copyright', (string)$docBlock->getFirstTagByName('copyright')->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('version'));
        self::assertSame('3.0', $docBlock->getFirstTagByName('version')->getVersion());
        self::assertSame('version description', (string)$docBlock->getFirstTagByName('version')->getDescription());
    }

    public function testResolveInheritDocWithoutParent(): void
    {
        $docBlock = $this->resolver->resolve(
            $this->reflector->reflect(ExampleChildClass::class)->getMethod('noParent')
        );

        self::assertSame('', $docBlock->getSummary());
        self::assertSame('@inheritdoc', $docBlock->getDescription());
    }
}
