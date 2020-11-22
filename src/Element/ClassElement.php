<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element;

use spaceonfire\Collection\CollectionInterface;
use spaceonfire\Collection\IndexedCollection;
use spaceonfire\Collection\TypedCollection;
use spaceonfire\Type\InstanceOfType;

final class ClassElement extends AbstractElement
{
    /**
     * @var bool
     */
    public $abstract;
    /**
     * @var bool
     */
    public $final;
    /**
     * @var CollectionInterface<ConstantElement>|ConstantElement[]
     */
    public $constants;
    /**
     * @var CollectionInterface<PropertyElement>|PropertyElement[]
     */
    public $properties;
    /**
     * @var CollectionInterface<MethodElement>|MethodElement[]
     */
    public $methods;
    /**
     * @var CollectionInterface<PropertyElement>|PropertyElement[]
     */
    public $magicProperties;
    /**
     * @var CollectionInterface<MethodElement>|MethodElement[]
     */
    public $magicMethods;
    /**
     * @var ClassElement|null
     */
    public $parent;
    /**
     * @var CollectionInterface<InterfaceElement>|InterfaceElement[]
     */
    public $interfaces;
    /**
     * @var CollectionInterface<TraitElement>|TraitElement[]
     */
    public $traits;

    protected function init(): void
    {
        $this->constants = new TypedCollection(
            new IndexedCollection([], static function (ConstantElement $constantElement): string {
                return $constantElement->name->getShortName();
            }),
            new InstanceOfType(ConstantElement::class)
        );
        $this->properties = new TypedCollection(
            new IndexedCollection([], static function (PropertyElement $propertyElement): string {
                return $propertyElement->name->getShortName();
            }),
            new InstanceOfType(PropertyElement::class)
        );
        $this->methods = new TypedCollection(
            new IndexedCollection([], static function (MethodElement $propertyElement): string {
                return $propertyElement->name->getShortName();
            }),
            new InstanceOfType(MethodElement::class)
        );
        $this->magicProperties = new TypedCollection(
            new IndexedCollection([], static function (PropertyElement $propertyElement): string {
                return $propertyElement->name->getShortName();
            }),
            new InstanceOfType(PropertyElement::class)
        );
        $this->magicMethods = new TypedCollection(
            new IndexedCollection([], static function (MethodElement $propertyElement): string {
                return $propertyElement->name->getShortName();
            }),
            new InstanceOfType(MethodElement::class)
        );

        $this->interfaces = new TypedCollection(
            new IndexedCollection([], static function (InterfaceElement $propertyElement): string {
                return $propertyElement->name->getShortName();
            }),
            new InstanceOfType(InterfaceElement::class)
        );
        $this->traits = new TypedCollection(
            new IndexedCollection([], static function (TraitElement $propertyElement): string {
                return $propertyElement->name->getShortName();
            }),
            new InstanceOfType(TraitElement::class)
        );
    }
}
