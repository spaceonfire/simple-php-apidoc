<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\Collections;

use spaceonfire\SimplePhpApiDoc\Elements\NamespaceElement;

class NamespacesCollection extends TypedCollection
{
    /**
     * NamespacesCollection constructor.
     * @param array $items
     */
    public function __construct($items = [])
    {
        parent::__construct($items, NamespaceElement::class);
    }
}
