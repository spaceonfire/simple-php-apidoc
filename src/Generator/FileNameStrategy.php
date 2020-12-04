<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Generator;

use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;

final class FileNameStrategy implements FileNameStrategyInterface
{
    /**
     * @var string
     */
    private $baseNamespace;
    /**
     * @var string
     */
    private $fileExtension;

    /**
     * FileNameStrategy constructor.
     * @param string $baseNamespace
     * @param string $fileExtension
     */
    public function __construct(string $baseNamespace, string $fileExtension)
    {
        $this->baseNamespace = rtrim($baseNamespace, '\\');
        $this->fileExtension = ltrim($fileExtension, '.');
    }

    /**
     * @inheritDoc
     */
    public function generate(Fqsen $fqsen): string
    {
        $name = str_replace([$this->baseNamespace, '\\'], ['', DIRECTORY_SEPARATOR], $fqsen->getName());
        $name = ltrim($name, '/\\');
        return $name . '.' . $this->fileExtension;
    }
}
