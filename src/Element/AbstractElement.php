<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element;

use spaceonfire\ApiDoc\Element\Location\Location;
use spaceonfire\ApiDoc\Element\ValueObject\Example;
use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;
use spaceonfire\ApiDoc\Element\ValueObject\LinkInterface;
use spaceonfire\Collection\CollectionInterface;
use spaceonfire\Collection\TypedCollection;
use spaceonfire\Type\InstanceOfType;

abstract class AbstractElement implements ElementInterface
{
    /**
     * @var Fqsen
     */
    public $name;
    /**
     * @var string
     */
    public $summary;
    /**
     * @var string
     */
    public $description;
    /**
     * @var bool|string
     */
    public $deprecated = false;
    /**
     * @var Location|null
     */
    public $location;
    /**
     * @var CollectionInterface<LinkInterface>|LinkInterface[]
     */
    public $links;
    /**
     * @var CollectionInterface<Example>|Example[]
     */
    public $examples;

    final public function __construct()
    {
        $this->links = new TypedCollection([], new InstanceOfType(LinkInterface::class));
        $this->examples = new TypedCollection([], new InstanceOfType(Example::class));

        $this->init();
    }

    protected function init(): void
    {
    }
}
