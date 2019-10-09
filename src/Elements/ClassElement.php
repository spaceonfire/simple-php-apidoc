<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Location;
use phpDocumentor\Reflection\Php\Class_;
use spaceonfire\SimplePhpApiDoc\Context;

class ClassElement extends BaseElement
{
    /**
     * @var Class_
     */
    protected $element;
    /**
     * @var PropertyElement[]
     */
    protected $properties;
    /**
     * @var ConstantElement[]
     */
    protected $constants;
    /**
     * @var MethodElement[]
     */
    protected $methods;

    /**
     * ClassElement constructor.
     * @param Class_ $element
     * @param Context $context
     */
    public function __construct(Class_ $element, Context $context)
    {
        parent::__construct($element, $context);
    }

    /**
     * Getter for `element` property
     * @return Class_
     */
    public function getElement(): Class_
    {
        return $this->element;
    }

    /**
     * Setter for `element` property
     * @param Class_ $element
     * @return static
     */
    public function setElement($element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * Returns true when this class is final. Otherwise returns false.
     * @return bool
     */
    public function isFinal(): bool
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    /**
     * Returns true when this class is abstract. Otherwise returns false.
     * @return bool
     */
    public function isAbstract(): bool
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getParent(): ?ClassElement
    {
        return $this->context->getElement((string)$this->getParentFqsen());
    }

    /**
     * Returns the superclass this class is extending if available.
     * @return Fqsen|null
     */
    public function getParentFqsen(): ?Fqsen
    {
        return $this->proxy('getParent', func_get_args());
    }

    /**
     * Returns the interfaces this class is implementing.
     * @param bool $includeParent
     * @return Fqsen[]
     */
    public function getInterfaces(bool $includeParent = true): array
    {
        if ($includeParent && $this->getParent()) {
            $parentInterfaces = $this->getParent()->getInterfaces();
        } else {
            $parentInterfaces = [];
        }
        $interfaces = $this->proxy(__FUNCTION__, func_get_args());
        return array_merge($parentInterfaces, $interfaces);
    }

    /**
     * Returns the constants of this class.
     * @param bool $includeParent
     * @return ConstantElement[]
     */
    public function getConstants(bool $includeParent = true): array
    {
        if ($this->constants === null) {
            $this->constants = array_map(function ($prop) {
                return $this->context->elementFactory($prop);
            }, $this->proxy(__FUNCTION__, func_get_args()));
        }

        if ($includeParent && $this->getParent()) {
            $parentConst = $this->getParent()->getConstants();
        } else {
            $parentConst = [];
        }

        return array_merge($parentConst, $this->constants);
    }

    /**
     * @param bool $includeParent
     * @return MethodElement[]
     */
    public function getMethods(bool $includeParent = true): array
    {
        if ($this->methods === null) {
            $this->methods = array_map(function ($prop) {
                return $this->context->elementFactory($prop)->setClass($this);
            }, $this->proxy(__FUNCTION__, func_get_args()));
        }

        if ($includeParent && $this->getParent()) {
            $parentConst = $this->getParent()->getMethods();
        } else {
            $parentConst = [];
        }

        return array_merge($parentConst, $this->methods);
    }

    /**
     * @param bool $includeParent
     * @return PropertyElement[]
     */
    public function getProperties(bool $includeParent = true): array
    {
        if ($this->properties === null) {
            $this->properties = array_map(function ($prop) {
                return $this->context->elementFactory($prop);
            }, $this->proxy(__FUNCTION__, func_get_args()));
        }

        if ($includeParent && $this->getParent()) {
            $parentProps = $this->getParent()->getProperties();
        } else {
            $parentProps = [];
        }

        return array_merge($parentProps, $this->properties);
    }

    public function getUsedTraits(): array
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getFqsen(): Fqsen
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getName(): string
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getDocBlock(): ?DocBlock
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }

    public function getLocation(): Location
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }
}
