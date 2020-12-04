<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Signature;

use spaceonfire\ApiDoc\Element\ConstantElement;
use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet;
use Symfony\Component\VarExporter\VarExporter;

final class ConstantSignatureRenderer implements SignatureRendererInterface
{
    /**
     * @inheritDoc
     */
    public function supports(ElementInterface $element): bool
    {
        return $element instanceof ConstantElement;
    }

    /**
     * @inheritDoc
     * @param ConstantElement $element
     */
    public function render(ElementInterface $element): CodeSnippet
    {
        $parts = [];
        $parts[] = $element->visibility;
        $parts[] = 'const';
        $parts[] = $element->name->withoutClassName();
        $parts[] = '=';
        $parts[] = VarExporter::export($element->value->getValue());
        return new CodeSnippet(implode(' ', $parts), 'php');
    }
}
