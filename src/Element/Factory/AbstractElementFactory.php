<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Factory;

use GuzzleHttp\Psr7\Uri;
use phpDocumentor\Reflection\DocBlock\Tags\Deprecated;
use phpDocumentor\Reflection\DocBlock\Tags\Example as ExampleTag;
use phpDocumentor\Reflection\DocBlock\Tags\Link;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url as UrlReference;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use phpDocumentor\Reflection\Type as PhpDocumentorType;
use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\DocBlockResolverInterface;
use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\Location\Location;
use spaceonfire\ApiDoc\Element\Location\LocationFactory;
use spaceonfire\ApiDoc\Element\Type\Converter\PhpDocTypeConverter;
use spaceonfire\ApiDoc\Element\Type\Resolver\ArgumentTypeResolver;
use spaceonfire\ApiDoc\Element\Type\Resolver\CompositeTypeResolver;
use spaceonfire\ApiDoc\Element\Type\Resolver\FunctionReturnTypeResolver;
use spaceonfire\ApiDoc\Element\Type\Resolver\MemoizedTypeResolver;
use spaceonfire\ApiDoc\Element\Type\Resolver\PropertyTypeResolver;
use spaceonfire\ApiDoc\Element\Type\Resolver\TypeResolverInterface;
use spaceonfire\ApiDoc\Element\ValueObject\Example;
use spaceonfire\ApiDoc\Element\ValueObject\ExternalLink;
use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;
use spaceonfire\ApiDoc\Element\ValueObject\FqsenLink;
use spaceonfire\ApiDoc\Element\ValueObject\LinkInterface;
use spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported;
use spaceonfire\Type\Factory\TypeFactoryInterface;
use spaceonfire\Type\Type;

abstract class AbstractElementFactory implements ElementFactoryInterface
{
    /**
     * @var DocBlockResolverInterface
     */
    protected $docBlockResolver;
    /**
     * @var TypeFactoryInterface
     */
    protected $typeFactory;
    /**
     * @var TypeResolverInterface
     */
    protected $typeResolver;
    /**
     * @var ElementFactoryInterface
     */
    protected $parent;
    /**
     * @var LocationFactory
     */
    protected $locationFactory;

    /**
     * ElementFactory constructor.
     * @param DocBlockResolverInterface $docBlockResolver
     * @param TypeFactoryInterface $typeFactory
     * @param LocationFactory $locationFactory
     */
    public function __construct(
        DocBlockResolverInterface $docBlockResolver,
        TypeFactoryInterface $typeFactory,
        LocationFactory $locationFactory
    ) {
        $this->docBlockResolver = $docBlockResolver;
        $this->typeFactory = $typeFactory;
        $this->typeResolver = new MemoizedTypeResolver(new CompositeTypeResolver(
            new ArgumentTypeResolver($typeFactory),
            new FunctionReturnTypeResolver($typeFactory),
            new PropertyTypeResolver($typeFactory)
        ));
        $this->locationFactory = $locationFactory;
    }

    /**
     * @inheritDoc
     */
    final public function make(object $reflection): ElementInterface
    {
        if (!$this->supports($reflection)) {
            throw GivenReflectionNotSupported::byElementFactory($reflection);
        }

        return $this->doMake($reflection);
    }

    /**
     * @param object $reflection
     * @return ElementInterface
     */
    abstract protected function doMake(object $reflection): ElementInterface;

    /**
     * @inheritDoc
     */
    final public function setParent(ElementFactoryInterface $factory): void
    {
        $this->parent = $factory;
    }

    /**
     * @param PhpDocumentorType|null $type
     * @param mixed|null $selfReplacement
     * @param mixed|null $parentReplacement
     * @return Type|null
     */
    final protected function createTypeFromDocBlock(
        ?PhpDocumentorType $type,
        $selfReplacement = null,
        $parentReplacement = null
    ): ?Type {
        if (null === $type) {
            return null;
        }

        if (null !== $selfReplacement && !$selfReplacement instanceof Type) {
            $selfReplacement = $this->typeFactory->supports($selfReplacement)
                ? $this->typeFactory->make($selfReplacement)
                : null;
        }

        if (null === $parentReplacement && null !== $selfReplacement) {
            $parentReplacement = 'parent:' . $selfReplacement;
        }

        if (null !== $parentReplacement && !$parentReplacement instanceof Type) {
            $parentReplacement = $this->typeFactory->supports($parentReplacement)
                ? $this->typeFactory->make($parentReplacement)
                : null;
        }

        return (new PhpDocTypeConverter($this->typeFactory))($type, $selfReplacement, $parentReplacement);
    }

    /**
     * @param DocBlock $docBlock
     * @return bool|string
     */
    final protected function getDeprecated(DocBlock $docBlock)
    {
        /** @var Deprecated|null $deprecatedTag */
        $deprecatedTag = $docBlock->getFirstTagByName('deprecated');

        if (null === $deprecatedTag) {
            return false;
        }

        $reason = trim((string)$deprecatedTag->getDescription());

        return '' === $reason ? true : $reason;
    }

    /**
     * @param DocBlock $docBlock
     * @return LinkInterface[]
     */
    final protected function makeLinksFromDocBlock(DocBlock $docBlock): iterable
    {
        $fqsenLinks = [];
        $externalLinks = [];

        /** @var Link $linkTag */
        foreach ($docBlock->getTagsByName('link') as $linkTag) {
            $description = trim((string)($linkTag->getDescription() ?? ''));

            $externalLinks[] = new ExternalLink(
                new Uri($linkTag->getLink()),
                '' === $description ? null : $description
            );
        }

        /** @var See $seeTag */
        foreach ($docBlock->getTagsByName('see') as $seeTag) {
            $description = trim((string)($seeTag->getDescription() ?? ''));

            $reference = $seeTag->getReference();

            if ($reference instanceof UrlReference) {
                $externalLinks[] = new ExternalLink(
                    new Uri((string)$reference),
                    '' === $description ? null : $description
                );
            } else {
                $fqsenLinks[] = new FqsenLink(
                    new Fqsen((string)$reference),
                    '' === $description ? null : $description
                );
            }
        }

        return array_merge($fqsenLinks, $externalLinks);
    }

    /**
     * @param DocBlock $docBlock
     * @param Location $location
     * @return Example[]
     */
    final protected function makeExamplesFromDocBlock(DocBlock $docBlock, Location $location): iterable
    {
        /** @var ExampleTag $exampleTag */
        foreach ($docBlock->getTagsByName('example') as $exampleTag) {
            yield new Example(
                $exampleTag->getFilePath(),
                $location,
                $exampleTag->getStartingLine(),
                $exampleTag->getLineCount(),
                $exampleTag->getDescription()
            );
        }
    }
}
