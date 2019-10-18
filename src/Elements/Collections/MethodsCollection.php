<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\Collections;

use spaceonfire\Collection\TypedCollection;
use spaceonfire\SimplePhpApiDoc\Elements\MethodElement;

class MethodsCollection extends TypedCollection implements FilterableByVisibilityCollectionInterface
{
    use FilterableByVisibilityCollectionTrait;

    /**
     * MethodsCollection constructor.
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items, MethodElement::class);
    }
}
