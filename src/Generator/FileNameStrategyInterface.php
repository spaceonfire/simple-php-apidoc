<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Generator;

use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;

interface FileNameStrategyInterface
{
    /**
     * @param Fqsen $fqsen
     * @return string
     */
    public function generate(Fqsen $fqsen): string;
}
