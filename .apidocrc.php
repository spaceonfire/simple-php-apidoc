<?php

declare(strict_types=1);

use spaceonfire\ApiDoc\Config\Processor\BuilderProcessor;
use spaceonfire\ApiDoc\Config\Processor\ProcessorInterface;

return static function (): ProcessorInterface {
    return (new BuilderProcessor())
        ->withProjectName('SpaceOnFire ApiDoc')
        ->withSourceDirectories([__DIR__ . '/src'])
        ->withOutputDirectory(__DIR__ . '/docs')
        ->withBaseNamespace('spaceonfire\ApiDoc');
};
