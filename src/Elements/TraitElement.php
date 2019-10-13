<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Location;
use phpDocumentor\Reflection\Php\Trait_;
use spaceonfire\SimplePhpApiDoc\Context;
use spaceonfire\SimplePhpApiDoc\Elements\Collections\MethodsCollection;
use spaceonfire\SimplePhpApiDoc\Elements\Collections\PropertiesCollection;
use spaceonfire\SimplePhpApiDoc\Elements\Collections\TraitsCollection;

class TraitElement extends BaseElement implements
    ElementDecoratorInterface,
    MethodOwnerInterface,
    PropertyOwnerInterface
{
    /**
     * @var Trait_
     */
    protected $element;
    /**
     * @var MethodsCollection
     */
    protected $methods;
    /**
     * @var PropertiesCollection
     */
    protected $properties;
    /**
     * @var TraitsCollection
     */
    protected $traits;

    /**
     * TraitElement constructor.
     * @param Trait_ $element
     * @param Context $context
     */
    public function __construct(Trait_ $element, Context $context)
    {
        parent::__construct($element, $context);
    }

    /**
     * Getter for `element` property
     * @return Trait_
     */
    public function getElement(): Trait_
    {
        return $this->element;
    }

    /**
     * Setter for `element` property
     * @param Trait_ $element
     * @return static
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMethods(): MethodsCollection
    {
        if ($this->methods === null) {
            $this->methods = new MethodsCollection(array_map(function ($prop) {
                return $this->context->elementFactory($prop)->setOwner($this);
            }, $this->proxy(__FUNCTION__, func_get_args())));

            $this->methods = $this->methods->merge(
                $this->getUsedTraits()->getMethods()->map(function (MethodElement $method) {
                    return (clone $method)->setOwner($this);
                })
            );
        }

        return $this->methods;
    }

    /**
     * {@inheritDoc}
     */
    public function getProperties(): PropertiesCollection
    {
        if ($this->properties === null) {
            $this->properties = new PropertiesCollection(array_map(function ($prop) {
                return $this->context->elementFactory($prop)->setOwner($this);
            }, $this->proxy(__FUNCTION__, func_get_args())));

            $this->properties = $this->properties->merge(
                $this->getUsedTraits()->getProperties()->map(function (PropertyElement $prop) {
                    return (clone $prop)->setOwner($this);
                })
            );
        }

        return $this->properties;
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

    public function getDocBlock(): ?DocBlock
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * @return TraitsCollection
     */
    public function getUsedTraits(): TraitsCollection
    {
        if ($this->traits === null) {
            $this->traits = new TraitsCollection(array_map(function (Fqsen $traitName) {
                return $this->getContext()->getElement((string)$traitName);
            }, $this->getUsedTraitsFqsen()));
        }

        return $this->traits;
    }

    /**
     * Returns fqsen of all traits used by this trait.
     * @return Fqsen[]
     */
    public function getUsedTraitsFqsen(): array
    {
        return $this->proxy('getUsedTraits', func_get_args());
    }

    public function getLocation(): Location
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }
}
