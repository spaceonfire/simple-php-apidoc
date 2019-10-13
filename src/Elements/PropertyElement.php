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
use spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\PropertyDocBlockResolver;

class PropertyElement extends BaseElement implements ElementDecoratorInterface, ElementVisibilityInterface
{
    /**
     * @var Property
     */
    protected $element;
    /**
     * @var DocBlock|null
     */
    protected $docBlock;
    /**
     * @var PropertyOwnerInterface
     */
    protected $owner;

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
     * Getter for `owner` property
     * @return PropertyOwnerInterface
     */
    public function getOwner(): PropertyOwnerInterface
    {
        return $this->owner;
    }

    /**
     * Setter for `owner` property
     * @param PropertyOwnerInterface $owner
     * @return PropertyElement
     */
    public function setOwner(PropertyOwnerInterface $owner): PropertyElement
    {
        $this->owner = $owner;
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
        if (!empty(($types = $this->proxy(__FUNCTION__, func_get_args())))) {
            return $types;
        }

        if (($docBlock = $this->getDocBlock()) === null) {
            return [];
        }

        $tags = $docBlock->getTagsByName('var');
        /** @var Var_|null $var */
        $var = reset($tags);

        return $var ? explode('|', (string)$var->getType()) : [];
    }

    /** {@inheritDoc} */
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
        if ($this->docBlock === null) {
            if (!($docBlock = $this->proxy(__FUNCTION__, func_get_args()))) {
                return null;
            }

            $this->docBlock = (new PropertyDocBlockResolver($docBlock, $this))->resolve();
        }

        return $this->docBlock;
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

    public function __toString()
    {
        return $this->getSignature();
    }

    public function getSignature(): string
    {
        $sig = [];
        $sig[] = $this->getVisibility();
        if ($this->isStatic()) {
            $sig[] = 'static';
        }
        $sig[] = implode('|', $this->getTypes());
        $sig[] = '$' . $this->getName();

        if ($this->getDefault()) {
            $sig[] = '=';
            $sig[] = $this->getDefault();
        }

        return implode(' ', array_filter($sig));
    }
}
