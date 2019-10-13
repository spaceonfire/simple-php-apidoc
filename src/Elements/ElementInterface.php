<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements;

use phpDocumentor\Reflection\Element;
use spaceonfire\SimplePhpApiDoc\Context;

interface ElementInterface
{
    /**
     * Getter for `context` property
     * @return Context
     */
    public function getContext(): Context;

    /**
     * Setter for `context` property
     * @param Context $context
     * @return static
     */
    public function setContext(Context $context);

    /**
     * Getter for `element` property
     * @return Element
     */
    public function getElement();

    /**
     * Setter for `element` property
     * @param Element $element
     * @return static
     */
    public function setElement($element);
}
