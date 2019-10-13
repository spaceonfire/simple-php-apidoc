<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\Collections;

use spaceonfire\Collection\CollectionInterface;

interface FilterableByVisibilityCollectionInterface extends CollectionInterface
{
    public const VISIBILITY_PUBLIC = 0b001;
    public const VISIBILITY_PROTECTED = 0b010;
    public const VISIBILITY_PRIVATE = 0b100;

    /**
     * Filter elements by their visibility
     * @param int $visibility Visibility bitmask
     * @return FilterableByVisibilityCollectionInterface
     */
    public function filterByVisibility(int $visibility): FilterableByVisibilityCollectionInterface;
}
