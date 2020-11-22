<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

final class FqsenLink implements LinkInterface
{
    /**
     * @var Fqsen
     */
    private $target;
    /**
     * @var string|null
     */
    private $description;

    /**
     * FqsenLink constructor.
     * @param Fqsen $target
     * @param string|null $description
     */
    public function __construct(Fqsen $target, ?string $description = null)
    {
        $this->target = $target;
        $this->description = $description;
    }

    /**
     * @inheritDoc
     */
    public function getTarget(): Fqsen
    {
        return $this->target;
    }

    /**
     * @inheritDoc
     */
    public function getText(): string
    {
        return (string)$this->target;
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}
