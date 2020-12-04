<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Render;

use spaceonfire\ApiDoc\Element\ElementInterface;

interface RendererInterface
{
    /**
     * @param ElementInterface $element
     * @return bool
     */
    public function supports(ElementInterface $element): bool;

    /**
     * Renders apiDoc for given element
     * @param ElementInterface $element
     * @param array<string,mixed> $context
     * @return string
     */
    public function render(ElementInterface $element, array $context = []): string;
}
