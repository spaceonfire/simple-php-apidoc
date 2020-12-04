<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\_Fixtures\Php72;

trait ExampleTrait
{
    /**
     * This property declared in trait
     *
     * Trait Description
     *
     * @var bool trait description
     * @author Trait Author
     * @copyright trait copyright
     * @version 1.0
     */
    public $propertyFromTrait;

    public function traitMethod(): void
    {
    }
}
