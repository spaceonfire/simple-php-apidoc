<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

final class CodeSnippet
{
    /**
     * @var string
     */
    private $content;
    /**
     * @var string|null
     */
    private $language;

    /**
     * CodeSnippet constructor.
     * @param string $content
     * @param string|null $language
     */
    public function __construct(string $content, ?string $language = null)
    {
        $this->content = $content;
        $this->language = $language;
    }

    /**
     * Getter for `content` property.
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Getter for `language` property.
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->content;
    }
}
