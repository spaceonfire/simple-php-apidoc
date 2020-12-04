<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use phpDocumentor\Reflection\DocBlock\Tags\Method;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use phpDocumentor\Reflection\DocBlock\Tags\PropertyRead;
use phpDocumentor\Reflection\DocBlock\Tags\PropertyWrite;
use phpDocumentor\Reflection\DocBlockFactory as PhpDocumentorDocBlockFactory;
use PHPUnit\Framework\TestCase;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\ClassReflector;
use spaceonfire\ApiDoc\_Fixtures\Php72\ExampleChildClass;
use spaceonfire\ApiDoc\_Fixtures\Php72\ExampleClass;
use spaceonfire\ApiDoc\Element\DocBlock\Factory\DocBlockFactory;

class ClassDocBlockResolverTest extends TestCase
{
    /**
     * @var ClassDocBlockResolver
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

        $this->resolver = new ClassDocBlockResolver(new DocBlockFactory(PhpDocumentorDocBlockFactory::createInstance()));
        $this->reflector = (new BetterReflection())->classReflector();

        $this->initialized = true;
    }

    public function testSupports(): void
    {
        self::assertFalse(
            $this->resolver->supports(
                $this->reflector->reflect(ExampleChildClass::class)->getProperty('propertyFromClass')
            )
        );
        self::assertTrue($this->resolver->supports($this->reflector->reflect(ExampleChildClass::class)));
    }

    public function testResolveForChild(): void
    {
        $docBlock = $this->resolver->resolve($this->reflector->reflect(ExampleChildClass::class));

        self::assertSame('Child class summary', $docBlock->getSummary());
        self::assertSame("Child class description\nInterface description\nParent class description", $docBlock->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('author'));
        self::assertSame('Child Author', $docBlock->getFirstTagByName('author')->getAuthorName());

        self::assertCount(1, $docBlock->getTagsByName('copyright'));
        self::assertSame('child copyright', (string)$docBlock->getFirstTagByName('copyright')->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('version'));
        self::assertSame('3.0', $docBlock->getFirstTagByName('version')->getVersion());
        self::assertSame('version description', (string)$docBlock->getFirstTagByName('version')->getDescription());

        self::assertCount(3, $docBlock->getTagsByName('method'));
        $expectedMagicMethods = ['methodA', 'methodB', 'methodC'];
        /** @var Method $methodTag */
        foreach ($docBlock->getTagsByName('method') as $methodTag) {
            self::assertContains($methodTag->getMethodName(), $expectedMagicMethods);

            switch ($methodTag->getMethodName()) {
                case 'methodA':
                    self::assertSame('declared by interface', (string)$methodTag->getDescription());
                    break;
                case 'methodB':
                    self::assertSame('redeclared by parent', (string)$methodTag->getDescription());
                    break;
                case 'methodC':
                    self::assertSame('redeclared by child', (string)$methodTag->getDescription());
                    break;
            }
        }

        /** @var array<Property|PropertyRead|PropertyWrite> $propertyTags */
        $propertyTags = array_merge(
            iterator_to_array($docBlock->getTagsByName('property')),
            iterator_to_array($docBlock->getTagsByName('property-read')),
            iterator_to_array($docBlock->getTagsByName('property-write'))
        );

        self::assertCount(3, $propertyTags);
        $expectedMagicProperties = ['propertyA', 'propertyB', 'propertyC'];

        foreach ($propertyTags as $propertyTag) {
            self::assertContains($propertyTag->getVariableName(), $expectedMagicProperties);

            switch ($propertyTag->getVariableName()) {
                case 'methodA':
                    self::assertSame('declared by interface', (string)$propertyTag->getDescription());
                    break;
                case 'methodB':
                    self::assertSame('redeclared by parent', (string)$propertyTag->getDescription());
                    break;
                case 'methodC':
                    self::assertSame('redeclared by child', (string)$propertyTag->getDescription());
                    break;
            }
        }

        self::assertCount(1, $docBlock->getTagsByName('package'));
        self::assertSame('child package', (string)$docBlock->getFirstTagByName('package')->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('subpackage'));
        self::assertSame('child subpackage', (string)$docBlock->getFirstTagByName('subpackage')->getDescription());
    }

    public function testResolveForParent(): void
    {
        $docBlock = $this->resolver->resolve($this->reflector->reflect(ExampleClass::class));

        self::assertSame('Parent class summary', $docBlock->getSummary());
        self::assertSame("Interface description\nParent class description", $docBlock->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('author'));
        self::assertSame('Parent Author', $docBlock->getFirstTagByName('author')->getAuthorName());

        self::assertCount(1, $docBlock->getTagsByName('copyright'));
        self::assertSame('parent copyright', (string)$docBlock->getFirstTagByName('copyright')->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('version'));
        self::assertSame('2.0', $docBlock->getFirstTagByName('version')->getVersion());
        self::assertSame('', (string)$docBlock->getFirstTagByName('version')->getDescription());

        self::assertCount(3, $docBlock->getTagsByName('method'));
        $expectedMagicMethods = ['methodA', 'methodB', 'methodC'];
        /** @var Method $methodTag */
        foreach ($docBlock->getTagsByName('method') as $methodTag) {
            self::assertContains($methodTag->getMethodName(), $expectedMagicMethods);

            switch ($methodTag->getMethodName()) {
                case 'methodA':
                    self::assertSame('declared by interface', (string)$methodTag->getDescription());
                    break;
                case 'methodB':
                case 'methodC':
                    self::assertSame('redeclared by parent', (string)$methodTag->getDescription());
                    break;
            }
        }

        /** @var array<Property|PropertyRead|PropertyWrite> $propertyTags */
        $propertyTags = array_merge(
            iterator_to_array($docBlock->getTagsByName('property')),
            iterator_to_array($docBlock->getTagsByName('property-read')),
            iterator_to_array($docBlock->getTagsByName('property-write'))
        );

        self::assertCount(3, $propertyTags);
        $expectedMagicProperties = ['propertyA', 'propertyB', 'propertyC'];

        foreach ($propertyTags as $propertyTag) {
            self::assertContains($propertyTag->getVariableName(), $expectedMagicProperties);

            switch ($propertyTag->getVariableName()) {
                case 'methodA':
                    self::assertSame('declared by interface', (string)$propertyTag->getDescription());
                    break;
                case 'methodB':
                case 'methodC':
                    self::assertSame('redeclared by parent', (string)$propertyTag->getDescription());
                    break;
            }
        }

        self::assertCount(1, $docBlock->getTagsByName('package'));
        self::assertSame('parent package', (string)$docBlock->getFirstTagByName('package')->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('subpackage'));
        self::assertSame('parent subpackage', (string)$docBlock->getFirstTagByName('subpackage')->getDescription());
    }
}
