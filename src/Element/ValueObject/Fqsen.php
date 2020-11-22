<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

final class Fqsen
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $shortName;
    /**
     * @var string
     */
    private $namespace;
    /**
     * @var bool
     */
    private $prefixedWithClassName;

    public function __construct(string $fqsen)
    {
        $this->name = trim($fqsen, '()');

        $this->prefixedWithClassName = 2 === count(explode('::', $this->name, 2));

        [$shortName, $namespace] = array_map('strrev', explode('\\', strrev($this->name), 2)) + ['', ''];

        $this->shortName = $shortName;
        $this->namespace = $namespace;
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getClassName(): self
    {
        if ('' === $withoutClassName = $this->withoutClassName()) {
            return $this;
        }

        $className = trim(str_replace($withoutClassName, '', $this->name), ':');
        return new self($className);
    }

    public function isPrefixedWithClassName(): bool
    {
        return $this->prefixedWithClassName;
    }

    public function withoutClassName(): string
    {
        $parts = explode('::', $this->name);
        return count($parts) > 1 ? end($parts) : '';
    }
}
