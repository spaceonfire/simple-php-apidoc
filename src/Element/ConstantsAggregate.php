<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element;

use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;

/**
 * Class ConstantsAggregate
 * @implements \IteratorAggregate<int|string,ConstantElement>
 * @package spaceonfire\ApiDoc\Element
 */
final class ConstantsAggregate implements ElementInterface, \IteratorAggregate, \Countable
{
    /**
     * @var Fqsen
     */
    private $fqsen;
    /**
     * @var ConstantElement[]
     */
    private $constantElements;

    public function __construct(ConstantElement  ...$constantElements)
    {
        $this->fqsen = new Fqsen('constants');
        $this->constantElements = $constantElements;
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
     * @return \ArrayIterator<int|string,ConstantElement>|ConstantElement[]
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->constantElements);
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->constantElements);
    }
}
