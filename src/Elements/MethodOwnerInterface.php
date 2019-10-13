<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use spaceonfire\SimplePhpApiDoc\Elements\Collections\MethodsCollection;

interface MethodOwnerInterface extends ElementDecoratorInterface
{
    /**
     * Returns collection of methods
     * @return MethodsCollection
     */
    public function getMethods(): MethodsCollection;
}
