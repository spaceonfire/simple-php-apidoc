<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Type\Resolver;

use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\Type\Type;

interface TypeResolverInterface
{
    /**
     * Checks that current resolver works with given reflection object.
     * @param object $reflection
     * @return bool
     */
    public function supports(object $reflection): bool;

    /**
     * Resolve type for given Roave BetterReflection object and its DocBlock.
     * @param object $reflection
     * @param DocBlock $docBlock
     * @return Type|null
     */
    public function resolve(object $reflection, DocBlock $docBlock): ?Type;
}
