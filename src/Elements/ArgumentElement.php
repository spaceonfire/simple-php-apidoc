<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\Php\Argument;
use phpDocumentor\Reflection\Type;

class ArgumentElement extends BaseElement
{
    /**
     * @var Argument
     */
    protected $element;

    /**
     * Getter for `element` property
     * @return Argument
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Setter for `element` property
     * @param Argument $element
     * @return static
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * Returns the name of this argument.
     */
    public function getName(): string
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getType(): ?Type
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getDefault(): ?string
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function isByReference(): bool
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function isVariadic(): bool
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getSignature(): string
    {
        $sig = [];
        $sig[] = (string)$this->getType();

        $arg = [];
        if ($this->isVariadic()) {
            $arg[] = '...';
        }
        if ($this->isByReference()) {
            $arg[] = '&';
        }
        $arg[] = '$' . $this->getName();

        $sig[] = implode($arg);

        if ($this->getDefault()) {
            $sig[] = '=';
            $sig[] = $this->getDefault();
        }

        return implode(' ', $sig);
    }

    public function __toString()
    {
        return $this->getSignature();
    }
}
