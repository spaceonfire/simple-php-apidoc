<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\Php\Visibility;

interface ElementVisibilityInterface
{
    /**
     * Returns the Visibility of this method.
     * @return Visibility|null
     */
    public function getVisibility(): ?Visibility;
}
