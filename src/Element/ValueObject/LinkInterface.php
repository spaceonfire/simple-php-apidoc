<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

interface LinkInterface
{
    /**
     * Returns link target
     * @return mixed
     */
    public function getTarget();

    /**
     * Returns link text
     * @return string
     */
    public function getText(): string;

    /**
     * Returns link description
     * @return string|null
     */
    public function getDescription(): ?string;
}
