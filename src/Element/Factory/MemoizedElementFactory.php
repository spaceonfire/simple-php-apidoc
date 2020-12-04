<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Factory;

use spaceonfire\ApiDoc\Element\ElementInterface;

final class MemoizedElementFactory implements ElementFactoryInterface
{
    /**
     * @var ElementFactoryInterface
     */
    private $factory;
    /**
     * @var \SplObjectStorage<object,bool>|bool[]
     */
    private $supportsCache;
    /**
     * @var \SplObjectStorage<object,ElementInterface>|ElementInterface[]
     */
    private $makeCache;

    public function __construct(ElementFactoryInterface $factory)
    {
        $factory->setParent($this);
        $this->factory = $factory;
        $this->supportsCache = new \SplObjectStorage();
        $this->makeCache = new \SplObjectStorage();
    }

    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return $this->supportsCache[$reflection]
            ?? $this->supportsCache[$reflection] = $this->factory->supports($reflection);
    }

    /**
     * @inheritDoc
     */
    public function make(object $reflection): ElementInterface
    {
        return $this->makeCache[$reflection]
            ?? $this->makeCache[$reflection] = $this->factory->make($reflection);
    }

    /**
     * @inheritDoc
     */
    public function setParent(ElementFactoryInterface $factory): void
    {
        $this->factory->setParent($factory);
    }
}
