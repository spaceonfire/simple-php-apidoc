<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Signature;

use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\FunctionElement;
use spaceonfire\ApiDoc\Element\MethodElement;
use spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet;
use spaceonfire\ApiDoc\Element\ValueObject\FunctionParameter;
use spaceonfire\Collection\Collection;
use Symfony\Component\VarExporter\VarExporter;

final class FunctionLikeElementSignatureRenderer implements SignatureRendererInterface
{
    /**
     * @inheritDoc
     */
    public function supports(ElementInterface $element): bool
    {
        return $element instanceof MethodElement
            || $element instanceof FunctionElement;
    }

    /**
     * @inheritDoc
     * @param MethodElement|FunctionElement $element
     */
    public function render(ElementInterface $element): CodeSnippet
    {
        $parts = [];

        if ($element instanceof MethodElement) {
            if ($element->final) {
                $parts[] = 'final';
            } elseif ($element->abstract) {
                $parts[] = 'abstract';
            }

            $parts[] = $element->visibility;

            if ($element->static) {
                $parts[] = 'static';
            }
        }

        $parts[] = 'function';

        $methodArguments = (new Collection($element->parameters))
            ->map(function (FunctionParameter $argument) {
                $signature = [];

                $signature[] = $argument->getType();

                $name = [];

                if ($argument->isVariadic()) {
                    $name[] = '...';
                }

                if ($argument->isPassedByReference()) {
                    $name[] = '&';
                }

                $name[] = '$' . $argument->getName();

                $signature[] = implode($name);

                if (null !== $argument->getDefaultValue()) {
                    $signature[] = '=';
                    $signature[] = VarExporter::export($argument->getDefaultValue()->getValue());
                }

                return implode(' ', $signature);
            })
            ->implode(', ');

        $parts[] = sprintf(
            '%s(%s)%s',
            $element instanceof MethodElement
                ? $element->name->withoutClassName()
                : $element->name->getShortName(),
            $methodArguments,
            $element->return && $element->return->getType() ? ': ' . $element->return->getType() : ''
        );

        return new CodeSnippet(implode(' ', $parts), 'php');
    }
}
