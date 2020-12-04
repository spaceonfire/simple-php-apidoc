<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Project;

use spaceonfire\ApiDoc\Element\ConstantElement;
use spaceonfire\ApiDoc\Element\ConstantsAggregate;
use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\FunctionElement;
use spaceonfire\ApiDoc\Element\FunctionsAggregate;
use spaceonfire\ApiDoc\Element\TableOfContentsElement;

final class Project
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var ElementInterface[]
     */
    private $classLikeElements;
    /**
     * @var FunctionsAggregate
     */
    private $functions;
    /**
     * @var ConstantsAggregate
     */
    private $constants;
    /**
     * @var TableOfContentsElement
     */
    private $toc;

    /**
     * Project constructor.
     * @param string $name
     * @param ElementInterface[] $classLikeElements
     * @param FunctionElement[] $functions
     * @param ConstantElement[] $constants
     */
    public function __construct(
        string $name,
        iterable $classLikeElements,
        iterable $functions = [],
        iterable $constants = []
    ) {
        $this->name = $name;
        $this->classLikeElements = $classLikeElements instanceof \Traversable
            ? iterator_to_array($classLikeElements)
            : $classLikeElements;
        $this->functions = new FunctionsAggregate(...$functions);
        $this->constants = new ConstantsAggregate(...$constants);
        $this->toc = new TableOfContentsElement(...$this->classLikeElements);
    }

    /**
     * Returns project name
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Getter for `classLikeElements` property.
     * @return ElementInterface[]
     */
    public function getClassLikeElements(): iterable
    {
        return $this->classLikeElements;
    }

    /**
     * Getter for `functions` property.
     * @return FunctionsAggregate
     */
    public function getFunctions(): FunctionsAggregate
    {
        return $this->functions;
    }

    /**
     * Getter for `constants` property.
     * @return ConstantsAggregate
     */
    public function getConstants(): ConstantsAggregate
    {
        return $this->constants;
    }

    /**
     * Getter for `toc` property.
     * @return TableOfContentsElement
     */
    public function getTableOfContents(): TableOfContentsElement
    {
        return $this->toc;
    }
}
