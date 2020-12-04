<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Config\Processor;

use spaceonfire\ApiDoc\Config\Config;

interface ProcessorInterface
{
    /**
     * Process config
     * @param Config $config
     */
    public function process(Config $config): void;
}
