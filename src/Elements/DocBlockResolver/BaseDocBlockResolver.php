<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\DocBlockFactory;
use spaceonfire\Collection\TypedCollection;
use spaceonfire\SimplePhpApiDoc\Context;

abstract class BaseDocBlockResolver
{
    /**
     * @var DocBlock
     */
    protected $docBlock;
    /**
     * @var Context
     */
    protected $context;

    protected static $inheritedTags = [];

    /**
     * @return Context
     */
    public function getContext(): Context
    {
        return $this->context;
    }

    /**
     * @param Context $context
     * @return static
     */
    public function setContext(Context $context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @return DocBlock
     */
    public function getDocBlock(): DocBlock
    {
        return $this->docBlock;
    }

    /**
     * @param DocBlock $docBlock
     * @return static
     */
    public function setDocBlock(DocBlock $docBlock)
    {
        $this->docBlock = $docBlock;
        return $this;
    }

    abstract public function resolve(): DocBlock;

    protected function docBlockToText(DocBlock $docBlock): string
    {
        $summary = $docBlock->getSummary();
        $description = (string)$docBlock->getDescription();
        $result = trim($summary . PHP_EOL . PHP_EOL . $description);
        $result = str_ireplace([
            '{@inheritdoc}',
            '@inheritdoc'
        ], '@inheritdoc', $result);
        return $result;
    }

    protected function mergeDocBlock(DocBlock $docBlock, string &$text, array &$tags): void
    {
        $text = str_replace('@inheritdoc', $this->docBlockToText($docBlock), $text);

        $tagsCollection = (new TypedCollection($tags, Tag::class));
        foreach (static::$inheritedTags as $tagName) {
            switch ($tagName) {
                case 'return':
                case 'author':
                case 'copyright':
                case 'version':
                case 'var':
                case 'package':
                case 'subpackage':
                    $foundTag = $tagsCollection->find(static function (Tag $tag) use ($tagName) {
                        return $tag->getName() === $tagName;
                    });

                    if ($foundTag) {
                        continue 2;
                    }

                    $inheritedTags = $docBlock->getTagsByName($tagName);
                    foreach ($inheritedTags as $inheritedTag) {
                        $tags[] = $inheritedTag;
                    }
                    break;

                case 'param':
                    $params = array_reverse($docBlock->getTagsByName('param'));
                    foreach ($params as $param) {
                        array_unshift($tags, $param);
                    }
                    break;

                case 'throw':
                    $throws = $docBlock->getTagsByName('throw');
                    foreach ($throws as $throw) {
                        $tags[] = $throw;
                    }
                    break;

                default:
                    continue 2;
                    break;
            }
        }
    }

    /**
     * @param string $text
     * @param Tag[] $tags
     * @return DocBlock
     */
    protected function buildDocBlock(string $text, array $tags = []): DocBlock
    {
        $tags = array_map(static function (Tag $tag) {
            return $tag->render();
        }, $tags);
        $docBlockString = implode(PHP_EOL, array_merge([$text], $tags));

        static $factory = null;
        if ($factory === null) {
            $factory = DocBlockFactory::createInstance();
        }

        return $factory->create($docBlockString ?: ' ');
    }
}
