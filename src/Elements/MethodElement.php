<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Location;
use phpDocumentor\Reflection\Php\Method;
use phpDocumentor\Reflection\Php\Visibility;
use phpDocumentor\Reflection\Type;
use spaceonfire\SimplePhpApiDoc\Context;

class MethodElement extends BaseElement
{
    /**
     * @var Method
     */
    protected $element;
    /**
     * @var ClassElement
     */
    protected $class;
    /**
     * @var ArgumentElement[]
     */
    protected $arguments;

    /**
     * MethodElement constructor.
     * @param Method $element
     * @param Context $context
     */
    public function __construct(Method $element, Context $context)
    {
        parent::__construct($element, $context);
    }

    /**
     * Getter for `element` property
     * @return Method
     */
    public function getElement(): Method
    {
        return $this->element;
    }

    /**
     * Setter for `element` property
     * @param Method $element
     * @return static
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * Getter for `class` property
     * @return ClassElement
     */
    public function getClass(): ClassElement
    {
        return $this->class;
    }

    /**
     * Setter for `class` property
     * @param ClassElement $class
     * @return static
     */
    public function setClass(ClassElement $class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * Returns true when this method is abstract. Otherwise returns false.
     */
    public function isAbstract(): bool
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns true when this method is final. Otherwise returns false.
     */
    public function isFinal(): bool
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
     * Returns the Visibility of this method.
     */
    public function getVisibility(): ?Visibility
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns the arguments of this method.
     *
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
     * Returns the DocBlock of this method if available.
     *
     * @returns null|DocBlock
     */
    public function getDocBlock(): ?DocBlock
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getLocation(): Location
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns the in code defined return type.
     *
     * Return types are introduced in php 7.0 when your could doesn't have a
     * return type defined this method will return Mixed_ by default. The return value of this
     * method is not affected by the return tag in your docblock.
     */
    public function getReturnType(): Type
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getShortFqsen(): string
    {
        $parts = explode('\\', (string)$this->getFqsen());
        return end($parts);
    }

    public function getSignature(): string
    {
        $sig = [];

        if ($this->isAbstract()) {
            $sig[] = 'abstract';
        }

        if ($this->isFinal()) {
            $sig[] = 'final';
        }

        $sig[] = (string)$this->getVisibility();

        if ($this->isStatic()) {
            $sig[] = 'static';
        }

        $sig[] = 'function';
        $sig[] = str_replace('()', '(' . implode(', ', $this->getArguments()) . ')', $this->getShortFqsen());

        return implode(' ', $sig) . ': ' . $this->getReturnType();
    }

    public function __toString()
    {
        return $this->getSignature();
    }

    public function getFileLocation(): ?string
    {
        if (!($file = $this->context->getFile((string)$this->getClass()->getFqsen()))) {
            return null;
        }

        return implode(':', array_filter([
            str_replace(getcwd() . DIRECTORY_SEPARATOR, '', $file->getPath()),
            $this->getLocation()->getLineNumber(),
            $this->getLocation()->getColumnNumber(),
        ]));
    }
}
