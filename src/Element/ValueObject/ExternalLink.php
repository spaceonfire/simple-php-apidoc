<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

use Psr\Http\Message\UriInterface;

final class ExternalLink implements LinkInterface
{
    /**
     * @var UriInterface
     */
    private $target;
    /**
     * @var string|null
     */
    private $description;

    /**
     * ExternalLink constructor.
     * @param UriInterface $target
     * @param string|null $description
     */
    public function __construct(UriInterface $target, ?string $description = null)
    {
        $this->target = $target;
        $this->description = $description;
    }

    /**
     * @inheritDoc
     */
    public function getTarget(): UriInterface
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
