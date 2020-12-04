<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element;

use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;

/**
 * Class FunctionsAggregate
 * @implements \IteratorAggregate<int|string,FunctionElement>
 * @package spaceonfire\ApiDoc\Element
 */
final class FunctionsAggregate implements ElementInterface, \IteratorAggregate, \Countable
{
    /**
     * @var Fqsen
     */
    private $fqsen;
    /**
     * @var FunctionElement[]
     */
    private $functionElements;

    public function __construct(FunctionElement  ...$functionElements)
    {
        $this->fqsen = new Fqsen('functions');
        $this->functionElements = $functionElements;
    }

    /**
     * Getter for `fqsen` property.
     * @return Fqsen
     */
    public function getFqsen(): Fqsen
    {
        return $this->fqsen;
    }

    /**
     * @inheritDoc
     * @return \ArrayIterator<int|string,FunctionElement>|FunctionElement[]
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->functionElements);
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->functionElements);
    }
}
