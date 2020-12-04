<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Example;

use spaceonfire\ApiDoc\Element\ValueObject\CodeSnippet;
use spaceonfire\ApiDoc\Element\ValueObject\Example;
use Symfony\Component\Finder\SplFileInfo;

final class ExampleCodeSnippetResolver
{
    /**
     * @var string[]
     */
    private $exampleDirectories;
    /**
     * @var bool
     */
    private $trimEmptyLines;
    /**
     * @var array<string,string>
     */
    private $extensionToLanguageMap = [
        'php' => 'php',
        'js' => 'js',
        'ts' => 'ts',
        'md' => 'md',
        'markdown' => 'md',
    ];

    /**
     * ExampleCodeSnippetResolver constructor.
     * @param string[] $exampleDirectories
     * @param bool $trimEmptyLines
     * @param array<string,string> $extensionToLanguageMap
     */
    public function __construct(
        array $exampleDirectories,
        bool $trimEmptyLines = true,
        array $extensionToLanguageMap = []
    ) {
        $this->exampleDirectories = $exampleDirectories;
        $this->trimEmptyLines = $trimEmptyLines;
        $this->extensionToLanguageMap = array_merge($this->extensionToLanguageMap, $extensionToLanguageMap);
    }

    public function supports(Example $example): bool
    {
        return null === $example->getUri();
    }

    public function resolve(Example $example): CodeSnippet
    {
        $fileInfo = $this->findFilePath($example);
        $lines = $this->getFileContentLines($fileInfo);

        $startLineIndex = max(0, $example->getStartingLine() - 1);

        $snippetLines = array_slice($lines, $startLineIndex, $example->getLineCount());
        $snippet = implode(PHP_EOL, $snippetLines);

        if ($this->trimEmptyLines) {
            $snippet = trim($snippet, PHP_EOL);
        }

        return new CodeSnippet($snippet, $this->getLanguageForFile($fileInfo));
    }

    private function findFilePath(Example $example): SplFileInfo
    {
        if (null !== $example->getUri()) {
            throw new \RuntimeException('Cannot resolve code snippet for uri examples.');
        }

        $findInDirectories = $this->exampleDirectories;
        array_unshift($findInDirectories, dirname($example->getLocation()->getAbsolutePath()));

        $triedPaths = [];

        foreach ($findInDirectories as $directory) {
            $triedPaths[] = $path = $directory . DIRECTORY_SEPARATOR . $example->getFilePath();

            if (false === $path = realpath($path)) {
                continue;
            }

            return new SplFileInfo($path, dirname($example->getFilePath()), basename($example->getFilePath()));
        }

        throw new \RuntimeException(sprintf(
            'Cannot find example file path for "%s". Tried paths: %s.',
            $example->getFilePath(),
            implode(', ', $triedPaths)
        ));
    }

    /**
     * @param SplFileInfo $path
     * @return string[]
     */
    private function getFileContentLines(SplFileInfo $path): array
    {
        static $cache = [];

        return $cache[$path->getPathname()]
            ?? $cache[$path->getPathname()] = array_map(static function (string $line): string {
                return rtrim($line, "\r\n");
            }, explode(PHP_EOL, $path->getContents()));
    }

    private function getLanguageForFile(SplFileInfo $fileInfo): ?string
    {
        return $this->extensionToLanguageMap[$fileInfo->getExtension()] ?? null;
    }
}
