<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Location;

final class Location
{
    /**
     * @var string
     */
    private $absolutePath;
    /**
     * @var string
     */
    private $filename;
    /**
     * @var int
     */
    private $lineNumber;
    /**
     * @var int
     */
    private $columnNumber;

    /**
     * Location constructor.
     * @param string $absolutePath
     * @param string $filename
     * @param int $lineNumber
     * @param int $columnNumber
     */
    public function __construct(string $absolutePath, string $filename, int $lineNumber, int $columnNumber = 0)
    {
        $this->absolutePath = $absolutePath;
        $this->filename = $filename;
        $this->lineNumber = $lineNumber;
        $this->columnNumber = $columnNumber;
    }

    /**
     * Getter for `absolutePath` property.
     * @return string
     */
    public function getAbsolutePath(): string
    {
        return $this->absolutePath;
    }

    /**
     * Getter for `filename` property.
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * Getter for `lineNumber` property.
     * @return int
     */
    public function getLineNumber(): int
    {
        return $this->lineNumber;
    }

    /**
     * Getter for `columnNumber` property.
     * @return int
     */
    public function getColumnNumber(): int
    {
        return $this->columnNumber;
    }
}
