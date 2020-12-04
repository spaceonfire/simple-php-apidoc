<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use spaceonfire\ApiDoc\Element\Example\ExampleCodeSnippetResolver;
use spaceonfire\ApiDoc\Element\Location\Location;

final class Example
{
    /**
     * @var string
     */
    private $filePath;
    /**
     * @var UriInterface|null
     */
    private $uri;
    /**
     * @var Location
     */
    private $location;
    /**
     * @var int
     */
    private $startingLine;
    /**
     * @var int|null
     */
    private $lineCount;
    /**
     * @var string|null
     */
    private $description;
    /**
     * @var CodeSnippet|null
     */
    private $codeSnippet;

    /**
     * Example constructor.
     * @param string $filePath
     * @param Location $location
     * @param int $startingLine
     * @param int|null $lineCount
     * @param string|null $description
     */
    public function __construct(
        string $filePath,
        Location $location,
        int $startingLine = 0,
        ?int $lineCount = null,
        ?string $description = null
    ) {
        $this->filePath = $filePath;

        try {
            $uri = new Uri($filePath);
            if (Uri::isAbsolute($uri)) {
                $this->uri = $uri;
            }
        } catch (\InvalidArgumentException $e) {
            // Ignore exception if file path cannot be parsed to uri
        }

        $this->location = $location;
        $this->startingLine = $startingLine;
        $this->lineCount = $lineCount > 0 ? $lineCount : null;
        $this->description = $description;
    }

    /**
     * Getter for `filePath` property.
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * Getter for `uri` property.
     * @return UriInterface|null
     */
    public function getUri(): ?UriInterface
    {
        return $this->uri;
    }

    /**
     * Getter for `location` property.
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * Getter for `startingLine` property.
     * @return int
     */
    public function getStartingLine(): int
    {
        return $this->startingLine;
    }

    /**
     * Getter for `lineCount` property.
     * @return int|null
     */
    public function getLineCount(): ?int
    {
        return $this->lineCount;
    }

    /**
     * Getter for `description` property.
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Resolve and cache code snippet for this example
     * @param ExampleCodeSnippetResolver $resolver
     * @return CodeSnippet
     */
    public function resolveCodeSnippet(ExampleCodeSnippetResolver $resolver): CodeSnippet
    {
        return $this->codeSnippet ?? ($this->codeSnippet = $resolver->resolve($this));
    }
}
