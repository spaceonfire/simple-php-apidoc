<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Factory;

use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;

interface DocBlockFactoryInterface
{
    /**
     * Creates ApiDoc's DocBlock object from reflection object.
     * @param object $reflection
     * @return DocBlock
     */
    public function make(object $reflection): DocBlock;
}
