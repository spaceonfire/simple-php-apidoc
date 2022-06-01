<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Signature;

use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet;

interface SignatureRendererInterface
{
    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function supports(ElementInterface $element): bool;

    /**
     * @param ElementInterface $element
     * @return CodeSnippet
     */
    public function render(ElementInterface $element): CodeSnippet;
}
