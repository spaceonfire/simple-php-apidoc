<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element;

use spaceonfire\ApiDoc\Element\ValueObject\Value;
use spaceonfire\ApiDoc\Element\ValueObject\Visibility;

final class ConstantElement extends AbstractElement
{
    /**
     * @var Visibility|null Constant visibility. `null` for constants declared outside of class.
     */
    public $visibility;
    /**
     * @var Value Constant value.
     */
    public $value;
}
