<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\Location;
use phpDocumentor\Reflection\Php\Class_;
use spaceonfire\SimplePhpApiDoc\Context;
use spaceonfire\SimplePhpApiDoc\Elements\Collections\MethodsCollection;
use spaceonfire\SimplePhpApiDoc\Elements\Collections\PropertiesCollection;
use spaceonfire\SimplePhpApiDoc\Elements\Collections\TraitsCollection;
use spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver\ClassDocBlockResolver;

class ClassElement extends BaseElement implements ElementDecoratorInterface, MethodOwnerInterface, PropertyOwnerInterface
{
    /**
     * @var Class_
     */
    protected $element;
    /**
     * @var PropertiesCollection
     */
    protected $properties;
    /**
     * @var ConstantElement[]
     */
    protected $constants;
    /**
     * @var MethodsCollection
     */
    protected $methods;
    /**
     * @var DocBlock|null
     */
    protected $docBlock;
    /**
     * @var TraitsCollection
     */
    protected $traits;

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
     * {@inheritDoc}
     * @param bool $includeParent
     */
    public function getMethods(bool $includeParent = true): MethodsCollection
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

        if ($includeParent && $this->getParent()) {
            $parentMethods = $this->getParent()->getMethods()
                ->filter(static function (MethodElement $method) {
                    return $method->getName() !== '__construct';
                });

            $result = (new MethodsCollection())->merge($parentMethods, $this->methods);
        } else {
            $result = clone $this->methods;
        }

        return $result->indexBy(static function (MethodElement $method) {
            return $method->getName();
        });
    }

    /**
     * {@inheritDoc}
     * @param bool $includeParent
     */
    public function getProperties(bool $includeParent = true): PropertiesCollection
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

        if ($includeParent && $this->getParent()) {
            $result = (new PropertiesCollection())->merge($this->getParent()->getProperties(), $this->properties);
        } else {
            $result = clone $this->properties;
        }

        return $result->indexBy(static function (PropertyElement $prop) {
            return $prop->getName();
        });
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

    public function getUsedTraitsFqsen(): array
    {
        return $this->proxy('getUsedTraits', func_get_args());
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
        if ($this->docBlock === null) {
            if (!($docBlock = $this->proxy(__FUNCTION__, func_get_args()))) {
                return null;
            }

            $this->docBlock = (new ClassDocBlockResolver($docBlock, $this))->resolve();
        }

        return $this->docBlock;
    }

    public function getLocation(): Location
    {
        return $this->proxy(__FUNCTION__, func_get_args());
    }
}
