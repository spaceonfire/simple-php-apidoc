<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element;

use spaceonfire\ApiDoc\Element\ValueObject\Value;
use spaceonfire\ApiDoc\Element\ValueObject\Visibility;
use spaceonfire\Type\Type;

final class PropertyElement extends AbstractElement
{
    /**
     * @var bool
     */
    public $static;
    /**
     * @var Visibility
     */
    public $visibility;
    /**
     * @var Type|null
     */
    public $type;
    /**
     * @var Value|null
     */
    public $defaultValue;
}
