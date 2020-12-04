<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use phpDocumentor\Reflection\DocBlock\Tags\Example;
use phpDocumentor\Reflection\DocBlockFactory as PhpDocumentorDocBlockFactory;
use PHPUnit\Framework\TestCase;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\ClassReflector;
use spaceonfire\ApiDoc\_Fixtures\Php72\ExampleChildClass;
use spaceonfire\ApiDoc\Element\DocBlock\Factory\DocBlockFactory;
use spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported;
use stdClass;

class DocBlockResolverTest extends TestCase
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

        $this->resolver = new CompositeDocBlockResolver(
            new DefaultDocBlockResolver(new DocBlockFactory(PhpDocumentorDocBlockFactory::createInstance([
                'example' => Example::class,
            ])))
        );
        $this->reflector = (new BetterReflection())->classReflector();

        $this->initialized = true;
    }

    public function testSupports(): void
    {
        self::assertFalse($this->resolver->supports(new stdClass()));
        self::assertTrue(
            $this->resolver->supports(
                $this->reflector->reflect(ExampleChildClass::class)->getReflectionConstant('PUBLIC_CONST')
            )
        );
    }

    public function testResolve(): void
    {
        $docBlock = $this->resolver->resolve(
            $this->reflector->reflect(ExampleChildClass::class)->getReflectionConstant('PUBLIC_CONST')
        );

        self::assertSame('Constant summary', $docBlock->getSummary());
        self::assertSame('Constant description', $docBlock->getDescription());

        self::assertCount(1, $docBlock->getTagsByName('var'));
        self::assertSame('Public Constant', (string)$docBlock->getFirstTagByName('var')->getDescription());
    }

    /**
     * @dataProvider resolveNotSupportedProvider()
     * @param DocBlockResolverInterface $resolver
     * @param object $reflection
     */
    public function testResolveNotSupported(DocBlockResolverInterface $resolver, object $reflection): void
    {
        $this->expectException(GivenReflectionNotSupported::class);
        $resolver->resolve($reflection);
    }

    public function resolveNotSupportedProvider(): array
    {
        $defaultDocBlockResolver = new DefaultDocBlockResolver(new DocBlockFactory(PhpDocumentorDocBlockFactory::createInstance()));
        return [
            [
                $defaultDocBlockResolver,
                new stdClass(),
            ],
            [
                new CompositeDocBlockResolver($defaultDocBlockResolver),
                new stdClass(),
            ],
        ];
    }
}
