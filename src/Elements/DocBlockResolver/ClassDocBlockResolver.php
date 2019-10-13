<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver;

use phpDocumentor\Reflection\DocBlock;
use spaceonfire\SimplePhpApiDoc\Elements\ClassElement;

/**
 * Class ClassDocBlockResolver
 * @package spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver
 * @link https://docs.phpdoc.org/guides/inheritance.html#classes-and-interfaces
 */
class ClassDocBlockResolver extends BaseDocBlockResolver
{
    protected static $inheritedTags = [
        'author',
        'copyright',
        'package',
        'subpackage',
        'version',
    ];

    /**
     * @var ClassElement
     */
    protected $class;

    /**
     * ClassDocBlockResolver constructor.
     * @param DocBlock $docBlock
     * @param ClassElement $class
     */
    public function __construct(DocBlock $docBlock, ClassElement $class)
    {
        $this->setDocBlock($docBlock);
        $this->setClass($class);
        $this->setContext($class->getContext());
    }

    /**
     * @return ClassElement
     */
    public function getClass(): ClassElement
    {
        return $this->class;
    }

    /**
     * @param ClassElement $class
     * @return ClassDocBlockResolver
     */
    public function setClass(ClassElement $class): ClassDocBlockResolver
    {
        $this->class = $class;
        return $this;
    }

    public function resolve(): DocBlock
    {
        $text = $this->docBlockToText($this->docBlock);
        if (strpos($text, '@inheritdoc') === false) {
            return $this->docBlock;
        }

        $tags = $this->getDocBlock()->getTags();

        $parent = $this->getClass()->getParent();
        if ($parent && $parentDocBlock = $parent->getDocBlock()) {
            $this->mergeDocBlock($parentDocBlock, $text, $tags);
        }

        return $this->buildDocBlock($text, $tags);
    }
}
