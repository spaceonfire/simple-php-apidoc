<?php

/** @noinspection PhpComposerExtensionStubsInspection */

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\ServiceProviders;

use spaceonfire\ApiDoc\Config\Config;
use spaceonfire\Container\ServiceProvider\AbstractServiceProvider;
use Symfony\Component\Translation\Loader\CsvFileLoader;
use Symfony\Component\Translation\Loader\IniFileLoader;
use Symfony\Component\Translation\Loader\JsonFileLoader;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\Loader\MoFileLoader;
use Symfony\Component\Translation\Loader\PhpFileLoader;
use Symfony\Component\Translation\Loader\PoFileLoader;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\Translator;
use Symfony\Contracts\Translation\TranslatorInterface;

final class TranslatorProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function provides(): array
    {
        return [
            TranslatorInterface::class,
            Translator::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->getContainer()->add(TranslatorInterface::class, Translator::class);
        $this->getContainer()->share(Translator::class, [$this, 'makeTranslator']);
    }

    public function makeTranslator(Config $config): TranslatorInterface
    {
        $translator = new Translator($config->locale);

        foreach ($this->makeLoadersForTranslations($config->translations) as $format => $loader) {
            $translator->addLoader($format, $loader);
        }

        foreach ($config->translations as $resource => $locale) {
            $fileInfo = new \SplFileInfo($resource);
            $format = $fileInfo->getExtension();
            $translator->addResource($format, $resource, $locale);
        }

        return $translator;
    }

    /**
     * @param array<string,string> $translations
     * @return \Generator<LoaderInterface>|LoaderInterface[]
     */
    private function makeLoadersForTranslations(array $translations): \Generator
    {
        $registeredLoaders = [];

        $loaderClassesMap = [
            'php' => PhpFileLoader::class,
            'csv' => CsvFileLoader::class,
            'ini' => IniFileLoader::class,
            'json' => JsonFileLoader::class,
            'mo' => MoFileLoader::class,
            'po' => PoFileLoader::class,
            'yaml' => YamlFileLoader::class,
            'yml' => YamlFileLoader::class,
        ];

        foreach ($translations as $resource => $_) {
            $fileInfo = new \SplFileInfo($resource);
            $format = $fileInfo->getExtension();

            if (!isset($loaderClassesMap[$format])) {
                throw new \InvalidArgumentException(sprintf(
                    'Loader not found for translation resource "%s"',
                    $resource
                ));
            }

            $loaderClass = $loaderClassesMap[$format];

            if (isset($registeredLoaders[$loaderClass])) {
                continue;
            }

            $registeredLoaders[$loaderClass] = true;

            $loader = new $loaderClass();

            yield $format => $loader;
        }
    }
}
