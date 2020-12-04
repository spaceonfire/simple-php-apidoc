<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Config;

use Composer\Autoload\ClassLoader;

final class Config
{
    /**
     * @var string
     */
    public $projectName;
    /**
     * @var string[]
     */
    public $sourceDirectories;
    /**
     * @var string
     */
    public $outputDirectory;
    /**
     * @var string[]
     */
    public $scanDirectories = [];
    /**
     * @var string[]
     */
    public $scanFiles = [];
    /**
     * @var string
     */
    public $phpVersion;
    /**
     * @var string
     */
    public $baseNamespace;
    /**
     * @var string
     */
    public $fileExtension;
    /**
     * @var string
     */
    public $twigTemplatesPath;
    /**
     * @var array<string,mixed>
     */
    public $twigOptions = [];
    /**
     * @var string
     */
    public $locale;
    /**
     * @var array<string,string>
     */
    public $translations = [];
    /**
     * @var string[]
     */
    public $examplesDirectories;
    /**
     * @var string[]
     */
    public $visibility = [];
    /**
     * @var string[]
     */
    public $constantsVisibility = [];
    /**
     * @var string[]
     */
    public $propertiesVisibility = [];
    /**
     * @var string[]
     */
    public $methodsVisibility = [];
    /**
     * @var ClassLoader|null
     */
    public $composerClassLoader;
}
