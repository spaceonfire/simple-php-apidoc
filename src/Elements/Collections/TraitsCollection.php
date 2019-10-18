<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\Collections;

use spaceonfire\Collection\TypedCollection;
use spaceonfire\SimplePhpApiDoc\Elements\TraitElement;

class TraitsCollection extends TypedCollection
{
    /**
     * TraitsCollection constructor.
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items, TraitElement::class);
    }

    /**
     * Returns collection of methods
     * @return MethodsCollection
     */
    public function getMethods(): MethodsCollection
    {
        $methods = array_values(array_map(static function (TraitElement $trait) {
            return $trait->getMethods();
        }, $this->all()));
        return (new MethodsCollection())->merge(...$methods);
    }

    /**
     * Returns collection of properties
     * @return PropertiesCollection
     */
    public function getProperties(): PropertiesCollection
    {
        $props = array_values(array_map(static function (TraitElement $trait) {
            return $trait->getProperties();
        }, $this->all()));
        return (new PropertiesCollection())->merge(...$props);
    }
}
