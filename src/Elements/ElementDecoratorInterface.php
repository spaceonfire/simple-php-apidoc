<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\Fqsen;

interface ElementDecoratorInterface extends ElementInterface
{
    /**
     * Returns the Fqsen of the element.
     * @return Fqsen
     */
    public function getFqsen(): Fqsen;

    /**
     * Returns the name of the element.
     * @return string
     */
    public function getName(): string;
}
