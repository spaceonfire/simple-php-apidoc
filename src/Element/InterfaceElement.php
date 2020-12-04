<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element;

use spaceonfire\Collection\CollectionInterface;
use spaceonfire\Collection\IndexedCollection;
use spaceonfire\Collection\TypedCollection;
use spaceonfire\Type\InstanceOfType;

final class InterfaceElement extends AbstractElement
{
    /**
     * @var CollectionInterface<ConstantElement>|ConstantElement[]
     */
    public $constants;
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
     * @var CollectionInterface<self>|self[]
     */
    public $parents;

    protected function init(): void
    {
        $this->constants = new TypedCollection(
            new IndexedCollection([], static function (ConstantElement $constantElement): string {
                return $constantElement->name->getShortName();
            }),
            new InstanceOfType(ConstantElement::class)
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
        $this->parents = new TypedCollection(
            new IndexedCollection([], static function (self $propertyElement): string {
                return $propertyElement->name->getShortName();
            }),
            new InstanceOfType(self::class)
        );
    }
}
