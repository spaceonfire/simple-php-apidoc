<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Location;
use phpDocumentor\Reflection\Php\Property;
use phpDocumentor\Reflection\Php\Visibility;
use spaceonfire\SimplePhpApiDoc\Context;

class PropertyElement extends BaseElement
{
    /**
     * @var Property
     */
    protected $element;

    /**
     * PropertyElement constructor.
     * @param Property $element
     * @param Context $context
     */
    public function __construct(Property $element, Context $context)
    {
        parent::__construct($element, $context);
    }

    /**
     * Getter for `element` property
     * @return Property
     */
    public function getElement(): Property
    {
        return $this->element;
    }

    /**
     * Setter for `element` property
     * @param Property $element
     * @return static
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * returns the default value of this property.
     */
    public function getDefault(): ?string
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns true when this method is static. Otherwise returns false.
     */
    public function isStatic(): bool
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns the types of this property.
     * @return string[]
     */
    public function getTypes(): array
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Return visibility of the property.
     */
    public function getVisibility(): ?Visibility
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns the Fqsen of the element.
     */
    public function getFqsen(): Fqsen
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns the name of the element.
     */
    public function getName(): string
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns the DocBlock of this property.
     */
    public function getDocBlock(): ?DocBlock
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getLocation(): Location
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getDescription(): string
    {
        if (!($docBlock = $this->getDocBlock())) {
            return '';
        }

        $varTags = $docBlock->getTagsByName('var');
        /** @var Var_|null $varTag */
        $varTag = reset($varTags);

        return trim(implode(PHP_EOL, array_filter([
            trim($docBlock->getSummary()),
            trim((string)$docBlock->getDescription()),
            $varTag ? trim((string)$varTag->getDescription()) : ''
        ])));
    }
}