<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

use spaceonfire\Collection\Collection;
use spaceonfire\Collection\CollectionInterface;

final class VisibilityFilter
{
    /**
     * @var CollectionInterface<Visibility>|Visibility[]
     */
    private $visibilities;

    public function __construct(Visibility ...$visibilities)
    {
        if (0 === count($visibilities)) {
            $visibilities = [
                Visibility::public(),
                Visibility::protected(),
                Visibility::private(),
            ];
        }

        $this->visibilities = (new Collection($visibilities))
            ->indexBy(function (Visibility $v) {
                return $v->value();
            });
    }

    public function hasPublic(): bool
    {
        return isset($this->visibilities[Visibility::PUBLIC]);
    }

    public function hasProtected(): bool
    {
        return isset($this->visibilities[Visibility::PROTECTED]);
    }

    public function hasPrivate(): bool
    {
        return isset($this->visibilities[Visibility::PRIVATE]);
    }
}
