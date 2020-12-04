<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use phpDocumentor\Reflection\DocBlockFactory as PhpDocumentorDocBlockFactory;
use PHPUnit\Framework\TestCase;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\ClassReflector;
use spaceonfire\ApiDoc\_Fixtures\Php72\ExampleChildClass;
use spaceonfire\ApiDoc\_Fixtures\Php72\ExampleClass;
use spaceonfire\ApiDoc\Element\DocBlock\Factory\DocBlockFactory;

class PropertyDocBlockResolverTest extends TestCase
{
    /**
     * @var PropertyDocBlockResolver
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

        $this->resolver = new PropertyDocBlockResolver(new DocBlockFactory(PhpDocumentorDocBlockFactory::createInstance()));
        $this->reflector = (new BetterReflection())->classReflector();

        $this->initialized = true;
    }

    public function testSupports(): void
    {
        self::assertTrue(
            $this->resolver->supports(
                $this->reflector->reflect(ExampleChildClass::class)->getProperty('propertyFromClass')
            )
        );
        self::assertFalse($this->resolver->supports($this->reflector->reflect(ExampleChildClass::class)));
    }

    public function testResolve(): void
    {
        $docBlock = $this->resolver->resolve(
            $this->reflector->reflect(ExampleChildClass::class)->getProperty('propertyFromClass')
        );

        self::assertSame('Property summary overridden in child class', $docBlock->getSummary());
        self::assertSame("Parent Description\nChild Description", $docBlock->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('var'));
        self::assertSame('child description', (string)$docBlock->getFirstTagByName('var')->getDescription());
        self::assertSame('int', (string)$docBlock->getFirstTagByName('var')->getType());

        self::assertCount(1, $docBlock->getTagsByName('author'));
        self::assertSame('Child Author', $docBlock->getFirstTagByName('author')->getAuthorName());

        self::assertCount(1, $docBlock->getTagsByName('copyright'));
        self::assertSame('child copyright', (string)$docBlock->getFirstTagByName('copyright')->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('version'));
        self::assertSame('3.0', $docBlock->getFirstTagByName('version')->getVersion());
        self::assertSame('version description', (string)$docBlock->getFirstTagByName('version')->getDescription());
    }

    public function testResolveTraitProperty(): void
    {
        $docBlock = $this->resolver->resolve(
            $this->reflector->reflect(ExampleChildClass::class)->getProperty('propertyFromTrait')
        );

        self::assertSame('Property summary overridden in child class', $docBlock->getSummary());
        self::assertSame('Trait Description', $docBlock->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('var'));
        self::assertSame('trait description', (string)$docBlock->getFirstTagByName('var')->getDescription());
        self::assertSame('bool', (string)$docBlock->getFirstTagByName('var')->getType());

        self::assertCount(1, $docBlock->getTagsByName('author'));
        self::assertSame('Child Author', $docBlock->getFirstTagByName('author')->getAuthorName());

        self::assertCount(1, $docBlock->getTagsByName('copyright'));
        self::assertSame('child copyright', (string)$docBlock->getFirstTagByName('copyright')->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('version'));
        self::assertSame('3.0', $docBlock->getFirstTagByName('version')->getVersion());
        self::assertSame('version description', (string)$docBlock->getFirstTagByName('version')->getDescription());

        $docBlock = $this->resolver->resolve(
            $this->reflector->reflect(ExampleClass::class)->getProperty('propertyFromTrait')
        );

        self::assertSame('This property declared in trait', $docBlock->getSummary());
        self::assertSame('Trait Description', $docBlock->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('var'));
        self::assertSame('trait description', (string)$docBlock->getFirstTagByName('var')->getDescription());
        self::assertSame('bool', (string)$docBlock->getFirstTagByName('var')->getType());

        self::assertCount(1, $docBlock->getTagsByName('author'));
        self::assertSame('Trait Author', $docBlock->getFirstTagByName('author')->getAuthorName());

        self::assertCount(1, $docBlock->getTagsByName('copyright'));
        self::assertSame('trait copyright', (string)$docBlock->getFirstTagByName('copyright')->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('version'));
        self::assertSame('1.0', $docBlock->getFirstTagByName('version')->getVersion());
        self::assertSame('', (string)$docBlock->getFirstTagByName('version')->getDescription());
    }

    public function testResolveInheritDocWithoutParent(): void
    {
        $docBlock = $this->resolver->resolve(
            $this->reflector->reflect(ExampleChildClass::class)->getProperty('propertyFromChildClass')
        );

        self::assertSame('', $docBlock->getSummary());
        self::assertSame('@inheritdoc', $docBlock->getDescription());
    }
}
