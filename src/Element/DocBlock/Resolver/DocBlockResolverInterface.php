<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;

interface DocBlockResolverInterface
{
    /**
     * Checks that current resolver works with given reflection object.
     * @param object $reflection
     * @return bool
     */
    public function supports(object $reflection): bool;

    /**
     * Creates ApiDoc's DocBlock object from Roave BetterReflection objects.
     * @param object $reflection
     * @return DocBlock
     */
    public function resolve(object $reflection): DocBlock;
}
