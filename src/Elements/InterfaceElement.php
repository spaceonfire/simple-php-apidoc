<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Location;
use phpDocumentor\Reflection\Php\Interface_;
use spaceonfire\SimplePhpApiDoc\Context;
use spaceonfire\SimplePhpApiDoc\Elements\Collections\MethodsCollection;

class InterfaceElement extends BaseElement implements ElementDecoratorInterface, MethodOwnerInterface
{
    /**
     * @var Interface_
     */
    protected $element;
    /**
     * @var ConstantElement[]
     */
    protected $constants;
    /**
     * @var MethodsCollection
     */
    protected $methods;

    /**
     * InterfaceElement constructor.
     * @param Interface_ $element
     * @param Context $context
     */
    public function __construct(Interface_ $element, Context $context)
    {
        parent::__construct($element, $context);
    }

    /**
     * Getter for `element` property
     * @return Interface_
     */
    public function getElement(): Interface_
    {
        return $this->element;
    }

    /**
     * Setter for `element` property
     * @param Interface_ $element
     * @return static
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * Returns the constants of this interface.
     * @return ConstantElement[]
     */
    public function getConstants(): array
    {
        if ($this->constants === null) {
            $this->constants = array_map(function ($prop) {
                return $this->context->elementFactory($prop);
            }, $this->proxy(__FUNCTION__, func_get_args()));
        }

        return $this->constants;
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
        }

        return $this->methods;
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
     * Returns the DocBlock of this interface if available.
     */
    public function getDocBlock(): ?DocBlock
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns the Fqsen of the interfaces this interface is extending.
     * @return Fqsen[]
     */
    public function getParents(): array
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getLocation(): Location
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }
}
