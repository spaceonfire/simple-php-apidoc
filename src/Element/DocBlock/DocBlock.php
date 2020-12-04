<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock;

use Generator;
use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\DocBlock\Tags\BaseTag;
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;

final class DocBlock
{
    /**
     * @var string
     */
    private $summary;
    /**
     * @var string
     */
    private $description;
    /**
     * @var array<string,array<Tag>>
     */
    private $tags = [];

    /**
     * DocBlock constructor.
     * @param string $summary
     * @param string $description
     * @param Tag[] $tags
     */
    public function __construct(string $summary, string $description, iterable $tags = [])
    {
        $this->summary = $summary;
        $this->description = $description;

        foreach ($tags as $tag) {
            if ($tag instanceof InvalidTag) {
                // TODO: log invalid tag
                continue;
            }

            if ($tag instanceof BaseTag && 'inheritdoc' === mb_strtolower($tag->getName())) {
                if (!self::checkInheritTag($this->description)) {
                    $tagDescription = $tag->getDescription();
                    $this->description = trim(sprintf(
                        '%s@inheritdoc%s',
                        $this->description . PHP_EOL,
                        $tagDescription ? PHP_EOL . $tagDescription : ''
                    ));
                }

                continue;
            }

            if (!isset($this->tags[$tag->getName()])) {
                $this->tags[$tag->getName()] = [$tag];
            } else {
                $this->tags[$tag->getName()][] = $tag;
            }
        }
    }

    /**
     * Getter for `summary` property.
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * Getter for `description` property.
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Getter for `tags` property.
     * @return Generator<Tag>
     */
    public function getTags(): Generator
    {
        foreach ($this->tags as $_ => $tags) {
            foreach ($tags as $tag) {
                yield $tag;
            }
        }
    }

    /**
     * @param string $tagName
     * @return Generator<Tag>
     */
    public function getTagsByName(string $tagName): Generator
    {
        if (!isset($this->tags[$tagName])) {
            return;
        }

        foreach ($this->tags[$tagName] as $tag) {
            yield $tag;
        }
    }

    public function getFirstTagByName(string $tagName): ?Tag
    {
        if (!isset($this->tags[$tagName])) {
            return null;
        }

        return $this->tags[$tagName][0];
    }

    public function hasTag(string $tagName): bool
    {
        return isset($this->tags[$tagName]);
    }

    /**
     * @return array<string,array<Tag>>
     */
    public function getTagsGroupedByName(): array
    {
        return $this->tags;
    }

    public function hasInheritTag(): bool
    {
        return self::checkInheritTag($this->description);
    }

    private static function checkInheritTag(string $text): bool
    {
        return false !== mb_stripos($text, '@inheritdoc');
    }
}
