<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Location;
use phpDocumentor\Reflection\Php\Constant;
use spaceonfire\SimplePhpApiDoc\Context;

class ConstantElement extends BaseElement
{
    /**
     * @var Constant
     */
    protected $element;

    /**
     * ClassElement constructor.
     * @param Constant $element
     * @param Context $context
     */
    public function __construct(Constant $element, Context $context)
    {
        parent::__construct($element, $context);
    }

    /**
     * Getter for `element` property
     * @return Constant
     */
    public function getElement(): Constant
    {
        return $this->element;
    }

    /**
     * Setter for `element` property
     * @param Constant $element
     * @return static
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * Returns the value of this constant.
     */
    public function getValue(): ?string
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
     * Returns DocBlock of this constant if available.
     */
    public function getDocBlock(): ?DocBlock
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getLocation(): Location
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }
}
