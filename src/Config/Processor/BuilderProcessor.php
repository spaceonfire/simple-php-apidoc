<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Config\Processor;

use Composer\Semver\VersionParser;
use spaceonfire\ApiDoc\Config\Config;
use spaceonfire\ApiDoc\Element\ValueObject\Visibility;
use Webmozart\Assert\Assert;
use Webmozart\PathUtil\Path;

final class BuilderProcessor implements ProcessorInterface
{
    /**
     * @var string|null
     */
    private $projectName;
    /**
     * @var string[]
     */
    private $sourceDirectories = [];
    /**
     * @var string|null
     */
    private $outputDirectory;
    /**
     * @var string[]
     */
    private $scanDirectories = [];
    /**
     * @var string[]
     */
    private $scanFiles = [];
    /**
     * @var string|null
     */
    private $phpVersion;
    /**
     * @var string|null
     */
    private $baseNamespace;
    /**
     * @var string|null
     */
    private $fileExtension;
    /**
     * @var string|null
     */
    private $twigTemplatesPath;
    /**
     * @var array<string,mixed>|null
     */
    private $twigOptions;
    /**
     * @var string|null
     */
    private $locale;
    /**
     * @var string[]|null
     */
    private $translations;
    /**
     * @var string[]
     */
    public $examplesDirectories = [];
    /**
     * @var string[]
     */
    public $visibility;
    /**
     * @var string[]
     */
    public $constantsVisibility;
    /**
     * @var string[]
     */
    public $propertiesVisibility;
    /**
     * @var string[]
     */
    public $methodsVisibility;

    public function withProjectName(string $projectName): self
    {
        $clone = clone $this;
        $clone->projectName = $projectName;
        return $clone;
    }

    /**
     * @param string[] $sourceDirectories
     * @return $this
     */
    public function withSourceDirectories(array $sourceDirectories): self
    {
        Assert::allStringNotEmpty($sourceDirectories);
        $clone = clone $this;
        $clone->sourceDirectories = $sourceDirectories;
        return $clone;
    }

    public function withOutputDirectory(string $outputDirectory): self
    {
        $clone = clone $this;
        $clone->outputDirectory = $outputDirectory;
        return $clone;
    }

    /**
     * @param string[] $scanDirectories
     * @return $this
     */
    public function withScanDirectories(array $scanDirectories): self
    {
        Assert::allStringNotEmpty($scanDirectories);
        $clone = clone $this;
        $clone->scanDirectories = $scanDirectories;
        return $clone;
    }

    /**
     * @param string[] $scanFiles
     * @return $this
     */
    public function withScanFiles(array $scanFiles): self
    {
        Assert::allStringNotEmpty($scanFiles);
        $clone = clone $this;
        $clone->scanFiles = $scanFiles;
        return $clone;
    }

    public function withPhpVersion(string $phpVersion): self
    {
        $clone = clone $this;
        $clone->phpVersion = $phpVersion;
        return $clone;
    }

    public function withBaseNamespace(string $baseNamespace): self
    {
        $clone = clone $this;
        $clone->baseNamespace = $baseNamespace;
        return $clone;
    }

    public function withFileExtension(string $fileExtension): self
    {
        $clone = clone $this;
        $clone->fileExtension = $fileExtension;
        return $clone;
    }

    public function withTwigTemplatesPath(string $twigTemplatesPath): self
    {
        $clone = clone $this;
        $clone->twigTemplatesPath = $twigTemplatesPath;
        return $clone;
    }

    /**
     * @param array<string,mixed> $twigOptions
     * @return $this
     */
    public function withTwigOptions(array $twigOptions): self
    {
        $clone = clone $this;
        $clone->twigOptions = $twigOptions;
        return $clone;
    }

    public function withLocale(string $locale): self
    {
        $clone = clone $this;
        $clone->locale = $locale;
        return $clone;
    }

    /**
     * @param array<string,string> $translations
     * @return $this
     */
    public function withTranslations(array $translations): self
    {
        Assert::allStringNotEmpty($translations);
        Assert::allStringNotEmpty(array_keys($translations));
        $clone = clone $this;
        $clone->translations = $translations;
        return $clone;
    }

    /**
     * @param string[] $examplesDirectories
     * @return $this
     */
    public function withExamplesDirectories(array $examplesDirectories): self
    {
        Assert::allStringNotEmpty($examplesDirectories);
        $clone = clone $this;
        $clone->examplesDirectories = $examplesDirectories;
        return $clone;
    }

    /**
     * @param string[] $visibility
     * @return $this
     */
    public function withVisibility(array $visibility): self
    {
        Assert::allInArray($visibility, Visibility::values());
        $clone = clone $this;
        $clone->visibility = $visibility;
        return $clone;
    }

    /**
     * @param string[] $constantsVisibility
     * @return $this
     */
    public function withConstantsVisibility(array $constantsVisibility): self
    {
        Assert::allInArray($constantsVisibility, Visibility::values());
        $clone = clone $this;
        $clone->constantsVisibility = $constantsVisibility;
        return $clone;
    }

    /**
     * @param string[] $propertiesVisibility
     * @return $this
     */
    public function withPropertiesVisibility(array $propertiesVisibility): self
    {
        Assert::allInArray($propertiesVisibility, Visibility::values());
        $clone = clone $this;
        $clone->propertiesVisibility = $propertiesVisibility;
        return $clone;
    }

    /**
     * @param string[] $methodsVisibility
     * @return $this
     */
    public function withMethodsVisibility(array $methodsVisibility): self
    {
        Assert::allInArray($methodsVisibility, Visibility::values());
        $clone = clone $this;
        $clone->methodsVisibility = $methodsVisibility;
        return $clone;
    }

    public function process(Config $config): void
    {
        if (null !== $this->projectName) {
            $config->projectName = $this->projectName;
        }

        if (count($this->sourceDirectories) > 0) {
            $config->sourceDirectories = $this->prepareDirectories($this->sourceDirectories);
        }

        if (null !== $this->outputDirectory) {
            $config->outputDirectory = $this->prepareOutputDirectory($this->outputDirectory);
        }

        if (count($this->scanDirectories) > 0) {
            $config->scanDirectories = $this->prepareDirectories($this->scanDirectories);
        }

        if (count($this->scanFiles) > 0) {
            $config->scanFiles = $this->scanFiles;
        }

        if (null !== $this->phpVersion) {
            $versionParser = new VersionParser();
            $bound = $versionParser->parseConstraints($this->phpVersion)->getLowerBound();

            if (!$bound->isZero() && !$bound->isPositiveInfinity()) {
                $config->phpVersion = $bound->getVersion();
            }
        }

        if (null !== $this->baseNamespace) {
            $config->baseNamespace = $this->baseNamespace;
        }

        if (null !== $this->fileExtension) {
            $config->fileExtension = $this->fileExtension;
        }

        if (null !== $this->twigTemplatesPath) {
            $config->twigTemplatesPath = $this->prepareOutputDirectory($this->twigTemplatesPath);
        }

        if (null !== $this->twigOptions && $this->twigOptions !== $config->twigOptions) {
            $config->twigOptions = array_merge($config->twigOptions, $this->twigOptions);
        }

        if (null !== $this->locale) {
            $config->locale = $this->locale;
        }

        if (null !== $this->translations) {
            $config->translations = array_merge($config->translations, $this->prepareTranslations($this->translations));
        }

        if (count($this->examplesDirectories) > 0) {
            $config->examplesDirectories = $this->prepareDirectories($this->examplesDirectories);
        } elseif (count($this->sourceDirectories) > 0) {
            // We already set prepared source directories to config, just use it
            $config->examplesDirectories = array_unique(array_map(static function (string $sourceDir): string {
                return dirname($sourceDir) . DIRECTORY_SEPARATOR . 'examples';
            }, $config->sourceDirectories));
        }

        if (null !== $this->visibility) {
            $config->visibility = $this->visibility;
        }

        if (null !== $this->constantsVisibility) {
            $config->constantsVisibility = $this->constantsVisibility;
        }

        if (null !== $this->propertiesVisibility) {
            $config->propertiesVisibility = $this->propertiesVisibility;
        }

        if (null !== $this->methodsVisibility) {
            $config->methodsVisibility = $this->methodsVisibility;
        }
    }

    /**
     * @param string[] $directories
     * @return string[]
     */
    private function prepareDirectories(array $directories): array
    {
        $output = [];

        foreach ($directories as $directory) {
            $output[] = $this->prepareDirectory($directory);
        }

        return $output;
    }

    private function prepareDirectory(string $directory): string
    {
        $cwd = getcwd();

        // Absolute dir
        if (str_starts_with($directory, DIRECTORY_SEPARATOR) && file_exists($directory)) {
            return $directory;
        }

        // Relative dir
        $relativeDirectory = $cwd . DIRECTORY_SEPARATOR . ltrim($directory, DIRECTORY_SEPARATOR);
        if (file_exists($relativeDirectory)) {
            return $relativeDirectory;
        }

        throw new \UnexpectedValueException(sprintf('Given directory "%s" does not exist', $directory));
    }

    private function prepareOutputDirectory(string $directory): string
    {
        if (Path::isAbsolute($directory)) {
            return $directory;
        }

        return getcwd() . DIRECTORY_SEPARATOR . $directory;
    }

    /**
     * @param array<string,string> $translations
     * @return array<string,string>
     */
    private function prepareTranslations(array $translations): array
    {
        $output = [];

        foreach ($translations as $filename => $locale) {
            $realFilename = Path::canonicalize($filename);
            if (false === file_exists($realFilename)) {
                throw new \InvalidArgumentException(sprintf('Translation file "%s" does not exist', $filename));
            }

            $output[$realFilename] = $locale;
        }

        return $output;
    }
}
