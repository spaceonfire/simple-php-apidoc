<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use phpDocumentor\Reflection\DocBlock\Tags\PropertyRead;
use phpDocumentor\Reflection\DocBlock\Tags\PropertyWrite;
use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;

final class DocBlockMerger
{
    /**
     * @var string[]
     */
    private $inheritTagNames;

    /**
     * DocBlockMerger constructor.
     * @param string[] $inheritTagNames
     */
    public function __construct(array $inheritTagNames)
    {
        $this->inheritTagNames = $inheritTagNames;
    }

    /**
     * Merge child and parent DocBlocks
     * @param DocBlock $child
     * @param DocBlock $parent
     * @return DocBlock
     */
    public function __invoke(DocBlock $child, DocBlock $parent): DocBlock
    {
        $summary = trim($child->getSummary());
        if ('' === $summary) {
            $summary = $parent->getSummary();
        }

        $description = trim(str_ireplace('@inheritdoc', $parent->getDescription(), $child->getDescription()));

        $tags = $child->getTagsGroupedByName();

        foreach ($this->inheritTagNames as $tagName) {
            switch ($tagName) {
                // Child overrides
                case 'return':
                case 'author':
                case 'copyright':
                case 'version':
                case 'var':
                case 'package':
                case 'subpackage':
                    if (isset($tags[$tagName])) {
                        continue 2;
                    }

                    if ($tag = $parent->getFirstTagByName($tagName)) {
                        $tags[$tagName] = [$tag];
                    }
                    break;

                // Child appends and partially overrides
                case 'param':
                    $parentTags = $this->indexParamTags(...$parent->getTagsByName('param'));
                    $childTags = $this->indexParamTags(...($tags['param'] ?? []));
                    $tags['param'] = $this->mergeTagsCollections($parentTags, $childTags);
                    break;

                case 'method':
                    $parentTags = $this->indexMethodTags(...$parent->getTagsByName('method'));
                    $childTags = $this->indexMethodTags(...($tags['method'] ?? []));
                    $tags['method'] = $this->mergeTagsCollections($parentTags, $childTags);
                    break;

                case 'property':
                    $parentPropertyTags = $this->indexPropertyTags(...$parent->getTagsByName('property'));
                    $parentPropertyReadTags = $this->indexPropertyTags(...$parent->getTagsByName('property-read'));
                    $parentPropertyWriteTags = $this->indexPropertyTags(...$parent->getTagsByName('property-write'));
                    $parentPropertyTags = $this->mergeTagsCollections(
                        $parentPropertyReadTags,
                        $parentPropertyWriteTags,
                        $parentPropertyTags
                    );
                    $parentPropertyTags = $this->indexPropertyTags(...$parentPropertyTags);

                    $childPropertyTags = $this->indexPropertyTags(...($tags['property'] ?? []));
                    $childPropertyReadTags = $this->indexPropertyTags(...($tags['property-read'] ?? []));
                    $childPropertyWriteTags = $this->indexPropertyTags(...($tags['property-write'] ?? []));
                    $childPropertyTags = $this->mergeTagsCollections(
                        $childPropertyReadTags,
                        $childPropertyWriteTags,
                        $childPropertyTags
                    );
                    $childPropertyTags = $this->indexPropertyTags(...$childPropertyTags);

                    $output = [];

                    foreach ($this->mergeTagsCollections($parentPropertyTags, $childPropertyTags) as $tag) {
                        if (!isset($output[$tag->getName()])) {
                            $output[$tag->getName()] = [$tag];
                        } else {
                            $output[$tag->getName()][] = $tag;
                        }
                    }

                    $tags = array_merge($tags, $output);
                    break;

                // Child appends by default
                default:
                    $parentTags = iterator_to_array($parent->getTagsByName($tagName));
                    $childTags = $tags[$tagName] ?? [];
                    $tags[$tagName] = [];

                    if (count($parentTags) > 0) {
                        array_push($tags[$tagName], ...$parentTags);
                    }

                    if (count($childTags) > 0) {
                        array_push($tags[$tagName], ...$childTags);
                    }
                    break;
            }
        }

        $flattenTags = [];
        foreach ($tags as $tagsGroup) {
            foreach ($tagsGroup as $tag) {
                $flattenTags[] = $tag;
            }
        }

        return new DocBlock($summary, $description, $flattenTags);
    }

    /**
     * @param Param ...$tags
     * @return array<string,Param>|Param[]
     */
    private function indexParamTags(Param ...$tags): array
    {
        $output = [];

        foreach ($tags as $tag) {
            if (null === $variableName = $tag->getVariableName()) {
                $output[] = $tag;
                continue;
            }

            $output[$variableName] = $tag;
        }

        return $output;
    }

    /**
     * @param Method ...$tags
     * @return array<string,Method>|Method[]
     */
    private function indexMethodTags(Method ...$tags): array
    {
        $output = [];

        foreach ($tags as $tag) {
            $output[$tag->getMethodName()] = $tag;
        }

        return $output;
    }

    /**
     * @param Property|PropertyRead|PropertyWrite ...$tags
     * @return array<Property|PropertyRead|PropertyWrite>
     */
    private function indexPropertyTags(Tag ...$tags): array
    {
        $output = [];

        foreach ($tags as $tag) {
            if (null === $variableName = $tag->getVariableName()) {
                $output[] = $tag;
                continue;
            }

            $output[$variableName] = $tag;
        }

        return $output;
    }

    /**
     * @param iterable<Tag> ...$tagsCollections
     * @return array<Tag>
     */
    private function mergeTagsCollections(iterable ...$tagsCollections): array
    {
        $stringKeys = [];
        $nonStringKeys = [];
        foreach ($tagsCollections as $tagsCollection) {
            foreach ($tagsCollection as $key => $tag) {
                if (is_string($key)) {
                    $stringKeys[$key] = $tag;
                } else {
                    $nonStringKeys[] = $tag;
                }
            }
        }
        $output = [];

        if (count($nonStringKeys) > 0) {
            array_push($output, ...$nonStringKeys);
        }

        if (count($stringKeys) > 0) {
            array_push($output, ...array_values($stringKeys));
        }

        return $output;
    }
}
