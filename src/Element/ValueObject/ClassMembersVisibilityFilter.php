<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

final class ClassMembersVisibilityFilter
{
    /**
     * @var VisibilityFilter
     */
    private $constantsVisibilityFilter;
    /**
     * @var VisibilityFilter
     */
    private $propertiesVisibilityFilter;
    /**
     * @var VisibilityFilter
     */
    private $methodsVisibilityFilter;

    /**
     * ClassMembersVisibilityFilter constructor.
     * @param VisibilityFilter $defaultVisibilityFilter
     * @param VisibilityFilter|null $constantsVisibilityFilter
     * @param VisibilityFilter|null $propertiesVisibilityFilter
     * @param VisibilityFilter|null $methodsVisibilityFilter
     */
    public function __construct(
        VisibilityFilter $defaultVisibilityFilter,
        ?VisibilityFilter $constantsVisibilityFilter = null,
        ?VisibilityFilter $propertiesVisibilityFilter = null,
        ?VisibilityFilter $methodsVisibilityFilter = null
    ) {
        $this->constantsVisibilityFilter = $constantsVisibilityFilter ?? $defaultVisibilityFilter;
        $this->propertiesVisibilityFilter = $propertiesVisibilityFilter ?? $defaultVisibilityFilter;
        $this->methodsVisibilityFilter = $methodsVisibilityFilter ?? $defaultVisibilityFilter;
    }

    /**
     * Getter for `constantsVisibilityFilter` property.
     * @return VisibilityFilter
     */
    public function forConstants(): VisibilityFilter
    {
        return $this->constantsVisibilityFilter;
    }

    /**
     * Getter for `propertiesVisibilityFilter` property.
     * @return VisibilityFilter
     */
    public function forProperties(): VisibilityFilter
    {
        return $this->propertiesVisibilityFilter;
    }

    /**
     * Getter for `methodsVisibilityFilter` property.
     * @return VisibilityFilter
     */
    public function forMethods(): VisibilityFilter
    {
        return $this->methodsVisibilityFilter;
    }
}
