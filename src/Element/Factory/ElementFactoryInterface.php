<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Factory;

use spaceonfire\ApiDoc\Element\ElementInterface;

interface ElementFactoryInterface
{
    /**
     * Checks that current factory works with given reflection object.
     * @param object $reflection
     * @return bool
     */
    public function supports(object $reflection): bool;

    /**
     * Creates ApiDoc element from Roave BetterReflection objects.
     * @param object $reflection
     * @return ElementInterface
     */
    public function make(object $reflection): ElementInterface;

    /**
     * Sets parent factory.
     * @param self $factory
     */
    public function setParent(self $factory): void;
}
