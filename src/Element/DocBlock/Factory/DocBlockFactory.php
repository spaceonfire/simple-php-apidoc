<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Factory;

use phpDocumentor\Reflection\DocBlockFactory as PhpDocumentorDocBlockFactory;
use phpDocumentor\Reflection\Types\Context;
use PhpParser\Node\Stmt\Namespace_;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use Roave\BetterReflection\Reflection\ReflectionProperty;
use Roave\BetterReflection\TypesFinder\PhpDocumentor\NamespaceNodeToReflectionTypeContext;
use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported;

final class DocBlockFactory implements DocBlockFactoryInterface
{
    /**
     * @var PhpDocumentorDocBlockFactory
     */
    private $docBlockFactory;
    /**
     * @var NamespaceNodeToReflectionTypeContext
     */
    private $makeContext;

    public function __construct(PhpDocumentorDocBlockFactory $docBlockFactory)
    {
        $this->docBlockFactory = $docBlockFactory;
        $this->makeContext = new NamespaceNodeToReflectionTypeContext();
    }

    /**
     * @inheritDoc
     */
    public function make(object $reflection): DocBlock
    {
        $comment = $this->extractComment($reflection);

        if ('' === trim($comment)) {
            return new DocBlock('', '');
        }

        $phpDocumentorDocBlock = $this->docBlockFactory->create(
            $this->extractComment($reflection),
            $this->makeContext($reflection)
        );

        return new DocBlock(
            $this->prepareDocBlockText($phpDocumentorDocBlock->getSummary()),
            $this->prepareDocBlockText($phpDocumentorDocBlock->getDescription()),
            $phpDocumentorDocBlock->getTags()
        );
    }

    private function extractComment(object $reflection): string
    {
        if (!method_exists($reflection, 'getDocComment')) {
            throw GivenReflectionNotSupported::forReason($reflection, 'Unable to extract phpDoc comment.');
        }

        return $reflection->getDocComment();
    }

    private function makeContext(object $reflection): ?Context
    {
        if (null !== $namespace = $this->extractDeclaringNamespaceNode($reflection)) {
            return ($this->makeContext)($namespace);
        }

        if (method_exists($reflection, 'getNamespaceName')) {
            return new Context($reflection->getNamespaceName());
        }

        if (method_exists($reflection, 'getDeclaringClass')) {
            $class = $reflection->getDeclaringClass();

            if ($class instanceof ReflectionClass) {
                return new Context($class->getNamespaceName());
            }
        }

        return null;
    }

    /**
     * @param ReflectionClass|ReflectionMethod|ReflectionProperty|object $reflection
     * @return Namespace_|null
     */
    private function extractDeclaringNamespaceNode(object $reflection): ?Namespace_
    {
        $extractor = (function (): ?Namespace_ {
            $vars = get_object_vars($this);

            if (!isset($vars['declaringNamespace'])) {
                return null;
            }

            if (!$vars['declaringNamespace'] instanceof Namespace_) {
                return null;
            }

            return $vars['declaringNamespace'];
        });

        $scopes = array_merge([get_class($reflection)], class_parents($reflection) ?: []);

        foreach ($scopes as $scope) {
            if (null !== $namespace = $extractor->bindTo($reflection, $scope)()) {
                return $namespace;
            }
        }

        return null;
    }

    /**
     * @param string|object|mixed $text
     * @return string
     */
    private function prepareDocBlockText($text): string
    {
        $text = (string)$text;

        $text = str_ireplace([
            '{@inheritdoc}',
            '@inheritdoc',
        ], '@inheritdoc', $text);

        return trim($text);
    }
}
