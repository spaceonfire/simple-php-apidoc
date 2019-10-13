<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver;

use phpDocumentor\Reflection\DocBlock;
use spaceonfire\SimplePhpApiDoc\Elements\ClassElement;
use spaceonfire\SimplePhpApiDoc\Elements\InterfaceElement;
use spaceonfire\SimplePhpApiDoc\Elements\MethodElement;

class MethodsDocBlockResolver extends BaseDocBlockResolver
{
    /**
     * @var MethodElement
     */
    protected $method;

    protected static $inheritedTags = [
        'author',
        'copyright',
        'version',
        'param',
        'return',
        'throws',
    ];

    /**
     * MethodsDocBlockResolver constructor.
     * @param DocBlock $docBlock
     * @param MethodElement $method
     */
    public function __construct(DocBlock $docBlock, MethodElement $method)
    {
        $this->setDocBlock($docBlock);
        $this->setMethod($method);
        $this->setContext($method->getContext());
    }

    /**
     * @return MethodElement
     */
    public function getMethod(): MethodElement
    {
        return $this->method;
    }

    /**
     * @param MethodElement $method
     * @return static
     */
    public function setMethod(MethodElement $method): MethodsDocBlockResolver
    {
        $this->method = $method;
        return $this;
    }

    public function resolve(): DocBlock
    {
        $text = $this->docBlockToText($this->docBlock);
        $methodOwner = $this->getMethod()->getOwner();

        if (!($methodOwner instanceof ClassElement) || strpos($text, '@inheritdoc') === false) {
            return $this->docBlock;
        }

        $tags = $this->getDocBlock()->getTags();

        $parentClass = $methodOwner->getParent();
        /** @var MethodElement|null $parentMethod */
        $parentMethod = $parentClass ? $parentClass->getMethods()->find(function (MethodElement $method) {
            return $method->getName() === $this->getMethod()->getName();
        }) : null;
        if ($parentMethod && $parentDocBlock = $parentMethod->getDocBlock()) {
            $this->mergeDocBlock($parentDocBlock, $text, $tags);
        }

        if (strpos($text, '@inheritdoc') === false) {
            return $this->buildDocBlock($text, $tags);
        }

        foreach ($methodOwner->getInterfaces() as $interfaceFqsen) {
            if (!($interface = $this->getContext()->getElement((string)$interfaceFqsen))) {
                continue;
            }

            /** @var InterfaceElement $interface */
            $parentMethod = $interface->getMethods()->find(function (MethodElement $method) {
                return $method->getName() === $this->getMethod()->getName();
            });

            if ($parentMethod && $parentDocBlock = $parentMethod->getDocBlock()) {
                $this->mergeDocBlock($parentDocBlock, $text, $tags);
            }

            if (strpos($text, '@inheritdoc') === false) {
                break;
            }
        }

        return $this->buildDocBlock($text, $tags);
    }
}
