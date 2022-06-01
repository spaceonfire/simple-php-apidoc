<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Config\Processor;

use Composer\Autoload\ClassLoader;
use spaceonfire\ApiDoc\Config\Config;
use Webmozart\Assert\Assert;

final class ComposerJsonProcessor implements ProcessorInterface
{
    /**
     * @var string
     */
    private $composerJsonPath;
    /**
     * @var array<string,mixed>
     */
    private $composerJson;

    /**
     * ComposerJsonProcessor constructor.
     * @param string $composerJsonPath
     */
    public function __construct(string $composerJsonPath)
    {
        $this->composerJsonPath = $composerJsonPath;
        $this->composerJson = $this->readComposerJson($composerJsonPath);
    }

    /**
     * @param string $filePath
     * @return array<string,mixed>
     */
    private function readComposerJson(string $filePath): array
    {
        Assert::fileExists($filePath);

        /** @var string $content */
        $content = file_get_contents($filePath);
        $json = json_decode($content, true, 512, JSON_BIGINT_AS_STRING);

        if ($error = json_last_error()) {
            throw new \RuntimeException(json_last_error_msg(), $error);
        }

        return $json;
    }

    /**
     * @inheritDoc
     */
    public function process(Config $config): void
    {
        $builder = new BuilderProcessor();

        $builder = $builder->withProjectName($this->composerJson['name']);

        $sourceDirectories = [];
        $autoloadNamespaces = [];
        $baseDirectory = dirname($this->composerJsonPath);
        foreach ($this->composerJson['autoload'] as $type => $autoload) {
            if (!in_array($type, ['psr-4', 'psr-0'], true)) {
                continue;
            }

            $autoloadNamespaces += array_flip(array_keys($autoload));

            foreach ($autoload as $dirs) {
                foreach ((array)$dirs as $dir) {
                    $directory = rtrim($baseDirectory . DIRECTORY_SEPARATOR . $dir, '/\\');
                    $sourceDirectories[$directory] = $directory;
                }
            }
        }

        $builder = $builder->withSourceDirectories(array_values($sourceDirectories));

        $autoloadNamespaces = array_flip($autoloadNamespaces);
        $baseNamespace = null;
        foreach ($autoloadNamespaces as $namespace) {
            if (null === $baseNamespace) {
                $baseNamespace = $namespace;
                continue;
            }

            if (str_starts_with($namespace, $baseNamespace)) {
                continue;
            }

            if (str_starts_with($baseNamespace, $namespace)) {
                $baseNamespace = $namespace;
                continue;
            }

            $baseNamespace = '';
            break;
        }

        $builder = $builder->withBaseNamespace($baseNamespace);

        $phpVersion = $this->composerJson['require']['php'] ?? null;

        if (null !== $phpVersion) {
            $builder = $builder->withPhpVersion($phpVersion);
        }

        $builder->process($config);

        if (null !== $classLoader = $this->findComposerClassLoader()) {
            $config->composerClassLoader = $classLoader;
        }
    }

    private function findComposerClassLoader(): ?ClassLoader
    {
        $autoloadFile = implode(DIRECTORY_SEPARATOR, [
            dirname($this->composerJsonPath),
            $this->composerJson['config']['vendor-dir'] ?? 'vendor',
            'autoload.php',
        ]);

        if (!file_exists($autoloadFile)) {
            return null;
        }

        /** @var ClassLoader $classLoader */
        $classLoader = require $autoloadFile;

        // Re-register class loader appended
        $classLoader->unregister();
        $classLoader->register(false);

        return $classLoader;
    }
}
