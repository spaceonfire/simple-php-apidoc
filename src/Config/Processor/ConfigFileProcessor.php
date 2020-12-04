<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Config\Processor;

use spaceonfire\ApiDoc\Config\Config;
use Webmozart\Assert\Assert;

final class ConfigFileProcessor implements ProcessorInterface
{
    public const DEFAULT_CONFIG_FILENAME = '.apidocrc.php';

    /**
     * @var string
     */
    private $configFilename;

    public function __construct(string $configFilename)
    {
        $this->configFilename = $this->prepareConfigFilename($configFilename);
    }

    private function prepareConfigFilename(string $filename): string
    {
        if (false === $realFilename = realpath($filename)) {
            throw new \InvalidArgumentException(sprintf('Config file "%s" does not exist.', $filename));
        }

        return $realFilename;
    }

    /**
     * @inheritDoc
     */
    public function process(Config $config): void
    {
        $configurator = require $this->configFilename;
        Assert::isCallable($configurator);
        $innerProcessor = $configurator();
        Assert::isInstanceOf($innerProcessor, ProcessorInterface::class);
        $innerProcessor->process($config);
    }
}
