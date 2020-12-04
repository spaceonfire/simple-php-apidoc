<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Location;

use Webmozart\Assert\Assert;

final class LocationFactory
{
    /**
     * @var string[]
     */
    private $sourceDirectories;

    /**
     * LocationFactory constructor.
     * @param string[] $sourceDirectories
     */
    public function __construct(array $sourceDirectories)
    {
        Assert::allString($sourceDirectories);
        $this->sourceDirectories = $sourceDirectories;
    }

    public function make(string $absolutePath, int $lineNumber, int $columnNumber = 0): Location
    {
        $relativeFilename = $this->getRelativeFilename($absolutePath);

        return new Location($absolutePath, $relativeFilename ?? $absolutePath, $lineNumber, $columnNumber);
    }

    private function getRelativeFilename(string $absolutePath): ?string
    {
        foreach ($this->sourceDirectories as $directory) {
            if (!str_starts_with($absolutePath, $directory)) {
                continue;
            }

            return ltrim(str_replace($this->sourceDirectories, '', $absolutePath), '/\\');
        }

        return null;
    }
}
