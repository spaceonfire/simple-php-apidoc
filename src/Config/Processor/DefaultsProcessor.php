<?php

/** @noinspection PhpComposerExtensionStubsInspection */

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Config\Processor;

use spaceonfire\ApiDoc\Config\Config;
use spaceonfire\ApiDoc\Element\ValueObject\Visibility;

final class DefaultsProcessor implements ProcessorInterface
{
    /**
     * @var bool
     */
    private $debug;

    /**
     * DefaultsProcessor constructor.
     * @param bool $debug
     */
    public function __construct(bool $debug = false)
    {
        $this->debug = $debug;
    }

    /**
     * @inheritDoc
     */
    public function process(Config $config): void
    {
        $processor = (new BuilderProcessor())
            ->withPhpVersion(\PHP_VERSION)
            ->withBaseNamespace('')
            ->withFileExtension('md')
            ->withTwigTemplatesPath(__DIR__ . '/../../../resources/views')
            ->withTwigOptions([
                'debug' => $this->debug,
                'autoescape' => false,
                // TODO: add cache
                //                'cache' => '/path/to/compilation_cache',
            ])
            ->withLocale(class_exists(\Locale::class) ? \Locale::getDefault() : 'en')
            ->withTranslations([
                __DIR__ . '/../../../resources/languages/en.php' => 'en',
                __DIR__ . '/../../../resources/languages/ru.php' => 'ru',
            ])
            ->withVisibility([Visibility::PUBLIC]);

        $processor->process($config);
    }
}
