<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Php\Namespace_;
use spaceonfire\SimplePhpApiDoc\Context;

class NamespaceElement extends BaseElement implements ElementDecoratorInterface
{
    /**
     * @var Namespace_
     */
    protected $element;

    /**
     * NamespaceElement constructor.
     * @param Namespace_ $element
     * @param Context $context
     */
    public function __construct(Namespace_ $element, Context $context)
    {
        parent::__construct($element, $context);
    }

    /**
     * Getter for `element` property
     * @return Namespace_
     */
    public function getElement(): Namespace_
    {
        return $this->element;
    }

    /**
     * Setter for `element` property
     * @param Namespace_ $element
     * @return static
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * Returns a list of all fqsen of classes in this namespace.
     *
     * @return Fqsen[]
     */
    public function getClasses(): array
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns a list of all constants in this namespace.
     *
     * @return Fqsen[]
     */
    public function getConstants(): array
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns a list of all functions in this namespace.
     *
     * @return Fqsen[]
     */
    public function getFunctions(): array
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns a list of all interfaces in this namespace.
     *
     * @return Fqsen[]
     */
    public function getInterfaces(): array
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns a list of all traits in this namespace.
     *
     * @return Fqsen[]
     */
    public function getTraits(): array
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
}
