<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use spaceonfire\SimplePhpApiDoc\Elements\Collections\PropertiesCollection;

interface PropertyOwnerInterface extends ElementDecoratorInterface
{
    /**
     * Returns collection of properties
     * @return PropertiesCollection
     */
    public function getProperties(): PropertiesCollection;
}
