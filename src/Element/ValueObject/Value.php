<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

final class Value
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * Value constructor.
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Getter for `value` property.
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
