<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

use spaceonfire\Type\Type;

abstract class AbstractTypedSymbol
{
    /**
     * @var string
     */
    private $description;
    /**
     * @var Type|null
     */
    private $type;

    /**
     * AbstractTypedSymbol constructor.
     * @param string $description
     * @param Type|null $type
     */
    public function __construct(string $description, ?Type $type = null)
    {
        $this->description = $description;
        $this->type = $type;
    }

    /**
     * Getter for `description` property.
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Getter for `type` property.
     * @return Type|null
     */
    public function getType(): ?Type
    {
        return $this->type;
    }
}
