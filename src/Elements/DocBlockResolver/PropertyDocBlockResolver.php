<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver;

use phpDocumentor\Reflection\DocBlock;
use spaceonfire\SimplePhpApiDoc\Elements\ClassElement;
use spaceonfire\SimplePhpApiDoc\Elements\PropertyElement;

/**
 * Class PropertyDocBlockResolver
 * @package spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver
 * @link https://docs.phpdoc.org/guides/inheritance.html#properties
 */
class PropertyDocBlockResolver extends BaseDocBlockResolver
{
    protected static $inheritedTags = [
        'author',
        'copyright',
        'version',
        'var',
    ];

    /**
     * @var PropertyElement
     */
    protected $property;

    /**
     * PropertyDocBlockResolver constructor.
     * @param DocBlock $docBlock
     * @param PropertyElement $property
     */
    public function __construct(DocBlock $docBlock, PropertyElement $property)
    {
        $this->setDocBlock($docBlock);
        $this->setProperty($property);
        $this->setContext($property->getContext());
    }

    /**
     * @return PropertyElement
     */
    public function getProperty(): PropertyElement
    {
        return $this->property;
    }

    /**
     * @param PropertyElement $property
     * @return PropertyDocBlockResolver
     */
    public function setProperty(PropertyElement $property): PropertyDocBlockResolver
    {
        $this->property = $property;
        return $this;
    }

    public function resolve(): DocBlock
    {
        $text = $this->docBlockToText($this->docBlock);
        $propertyOwner = $this->getProperty()->getOwner();

        if (!($propertyOwner instanceof ClassElement) || strpos($text, '@inheritdoc') === false) {
            return $this->docBlock;
        }

        $tags = $this->getDocBlock()->getTags();
        $parentClass = $propertyOwner->getParent();
        /** @var PropertyElement|null $parentProperty */
        $parentProperty = $parentClass ? $parentClass->getProperties()->find(function (PropertyElement $method) {
            return $method->getName() === $this->getProperty()->getName();
        }) : null;
        if ($parentProperty && $parentDocBlock = $parentProperty->getDocBlock()) {
            $this->mergeDocBlock($parentDocBlock, $text, $tags);
        }

        return $this->buildDocBlock($text, $tags);
    }
}
