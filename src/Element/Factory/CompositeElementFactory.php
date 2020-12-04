<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Factory;

use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Exception\GivenReflectionNotSupported;

final class CompositeElementFactory implements ElementFactoryInterface
{
    /**
     * @var ElementFactoryInterface[]
     */
    private $factories;
    /**
     * @var ElementFactoryInterface|null
     */
    private $parent;

    /**
     * CompositeElementFactory constructor.
     * @param ElementFactoryInterface ...$factories
     */
    public function __construct(ElementFactoryInterface ...$factories)
    {
        $this->factories = $factories;
    }

    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        foreach ($this->factories as $factory) {
            if ($factory->supports($reflection)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function make(object $reflection): ElementInterface
    {
        foreach ($this->factories as $factory) {
            if ($factory->supports($reflection)) {
                $factory->setParent($this->parent ?? $this);
                return $factory->make($reflection);
            }
        }

        throw GivenReflectionNotSupported::byElementFactory($reflection);
    }

    /**
     * @inheritDoc
     */
    public function setParent(ElementFactoryInterface $parent): void
    {
        $this->parent = $parent;
    }
}
