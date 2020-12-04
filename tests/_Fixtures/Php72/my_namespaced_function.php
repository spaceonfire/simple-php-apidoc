<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\_Fixtures\Php72;

/**
 * This function in namespace.
 *
 * Some description.
 *
 * @param DummyInterface $dummy
 * @return DummyInterface returns same `$dummy`
 */
function my_namespaced_function(DummyInterface $dummy): DummyInterface
{
    return $dummy;
}
