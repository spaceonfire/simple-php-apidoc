<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\Collections;

use spaceonfire\Collection\TypedCollection;
use spaceonfire\SimplePhpApiDoc\Elements\PropertyElement;

class PropertiesCollection extends TypedCollection implements FilterableByVisibilityCollectionInterface
{
    use FilterableByVisibilityCollectionTrait;

    /**
     * PropertiesCollection constructor.
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items, PropertyElement::class);
    }
}
