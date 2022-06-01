<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\_Fixtures\examples;

use spaceonfire\ApiDoc\_Fixtures\Php72\AbstractClass;

final class ConcreteClass extends AbstractClass
{
    public function abstractMethod(): int
    {
        return 42;
    }
}
