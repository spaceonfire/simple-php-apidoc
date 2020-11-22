<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

use spaceonfire\ValueObject\EnumValue;

/**
 * Class Visibility
 * @method static self public()
 * @method static self protected()
 * @method static self private()
 * @package spaceonfire\ApiDoc\ValueObject
 */
final class Visibility extends EnumValue
{
    public const PUBLIC = 'public';
    public const PROTECTED = 'protected';
    public const PRIVATE = 'private';
}
