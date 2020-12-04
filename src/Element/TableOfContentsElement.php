<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element;

use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;
use spaceonfire\ApiDoc\Element\ValueObject\FqsenLink;
use spaceonfire\Collection\Collection;
use spaceonfire\Collection\CollectionInterface;

/**
 * Class TableOfContentsElement.
 * @implements \IteratorAggregate<string,CollectionInterface<FqsenLink>>
 * @package spaceonfire\ApiDoc\Element
 */
final class TableOfContentsElement implements ElementInterface, \IteratorAggregate
{
    /**
     * @var Fqsen
     */
    private $fqsen;
    /**
     * @var CollectionInterface<ElementInterface>|ElementInterface[]
     */
    private $elements;

    /**
     * TableOfContentsElement constructor.
     * @param ElementInterface ...$elements
     */
    public function __construct(ElementInterface ...$elements)
    {
        $this->fqsen = new Fqsen('README');
        $this->elements = (new Collection($elements))
            ->sortBy(function (ElementInterface $element) {
                return $element->name->getName();
            }, SORT_ASC, SORT_STRING);
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
     * @return \Generator<string,CollectionInterface<FqsenLink>>
     */
    public function getIterator(): \Generator
    {
        $elementsPerNamespace = [];

        foreach ($this->elements as $element) {
            $namespace = $element->name->getNamespace();

            if (!isset($elementsPerNamespace[$namespace])) {
                $elementsPerNamespace[$namespace] = new Collection();
            }

            $elementsPerNamespace[$namespace][] = $element;
        }

        /**
         * @var string $namespace
         * @var CollectionInterface<ElementInterface> $elements
         */
        foreach ($elementsPerNamespace as $namespace => $elements) {
            yield $namespace => $elements
                ->groupBy(function (ElementInterface $element) {
                    if ($element instanceof TraitElement) {
                        return 'Traits';
                    }

                    if ($element instanceof InterfaceElement) {
                        return 'Interfaces';
                    }

                    return 'Classes';
                })
                ->sortByKey(SORT_ASC, SORT_STRING)
                ->map(function (CollectionInterface $items) {
                    return $items->map(function (ElementInterface $element) {
                        return new FqsenLink($element->name);
                    });
                });
        }
    }
}
