<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Signature;

use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\PropertyElement;
use spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet;
use Symfony\Component\VarExporter\VarExporter;

final class PropertySignatureRenderer implements SignatureRendererInterface
{
    /**
     * @inheritDoc
     */
    public function supports(ElementInterface $element): bool
    {
        return $element instanceof PropertyElement;
    }

    /**
     * @inheritDoc
     * @param PropertyElement $element
     */
    public function render(ElementInterface $element): CodeSnippet
    {
        $parts = [];

        $parts[] = $element->visibility;

        if ($element->static) {
            $parts[] = 'static';
        }

        if (null !== $element->type) {
            $parts[] = $element->type;
        }

        $parts[] = $element->name->withoutClassName();

        if (null !== $element->defaultValue) {
            $parts[] = '=';
            $parts[] = VarExporter::export($element->defaultValue->getValue());
        }

        return new CodeSnippet(implode(' ', $parts), 'php');
    }
}
