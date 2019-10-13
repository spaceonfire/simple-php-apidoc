<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Location;
use phpDocumentor\Reflection\Php\Function_;
use phpDocumentor\Reflection\Type;
use spaceonfire\SimplePhpApiDoc\Context;

class FunctionElement extends BaseElement implements ElementDecoratorInterface
{
    /**
     * @var Function_
     */
    protected $element;
    /**
     * @var ArgumentElement[]
     */
    protected $arguments;

    /**
     * FunctionElement constructor.
     * @param Function_ $element
     * @param Context $context
     */
    public function __construct(Function_ $element, Context $context)
    {
        parent::__construct($element, $context);
    }

    /**
     * Getter for `element` property
     * @return Function_
     */
    public function getElement(): Function_
    {
        return $this->element;
    }

    /**
     * Setter for `element` property
     * @param Function_ $element
     * @return static
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * Returns the arguments of this function.
     * @return ArgumentElement[]
     */
    public function getArguments(): array
    {
        if ($this->arguments === null) {
            $this->arguments = array_map(function ($prop) {
                return $this->context->elementFactory($prop);
            }, $this->proxy(__FUNCTION__, func_get_args()));
        }

        return $this->arguments;
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
     * Returns the DocBlock of the element if available
     */
    public function getDocBlock(): ?DocBlock
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getLocation(): Location
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getReturnType(): Type
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }
}
