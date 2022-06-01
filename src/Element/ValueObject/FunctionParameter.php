<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

use spaceonfire\Type\Type;

final class FunctionParameter extends AbstractTypedSymbol
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var bool
     */
    private $variadic;
    /**
     * @var bool
     */
    private $passedByReference;
    /**
     * @var Value|null
     */
    private $defaultValue;

    /**
     * Argument constructor.
     * @param string $name
     * @param string $description
     * @param Type|null $type
     * @param bool $variadic
     * @param bool $passedByReference
     * @param Value|null $defaultValue
     */
    public function __construct(
        string $name,
        string $description,
        ?Type $type = null,
        bool $variadic = false,
        bool $passedByReference = false,
        ?Value $defaultValue = null
    ) {
        parent::__construct($description, $type);

        $this->name = $name;
        $this->variadic = $variadic;
        $this->passedByReference = $passedByReference;
        $this->defaultValue = $defaultValue;
    }

    /**
     * Getter for `name` property.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Getter for `variadic` property.
     * @return bool
     */
    public function isVariadic(): bool
    {
        return $this->variadic;
    }

    /**
     * Getter for `passedByReference` property.
     * @return bool
     */
    public function isPassedByReference(): bool
    {
        return $this->passedByReference;
    }

    /**
     * Getter for `defaultValue` property.
     * @return Value|null
     */
    public function getDefaultValue(): ?Value
    {
        return $this->defaultValue;
    }
}
