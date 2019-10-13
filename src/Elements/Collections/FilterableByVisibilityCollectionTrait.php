<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\Collections;

use spaceonfire\SimplePhpApiDoc\Elements\ElementVisibilityInterface;

trait FilterableByVisibilityCollectionTrait
{
    /** {@inheritDoc} */
    public function filterByVisibility(int $visibility): FilterableByVisibilityCollectionInterface
    {
        $includePublic = $visibility & static::VISIBILITY_PUBLIC;
        $includeProtected = $visibility & static::VISIBILITY_PROTECTED;
        $includePrivate = $visibility & static::VISIBILITY_PRIVATE;

        return $this->filter(static function (ElementVisibilityInterface $item) use ($includePublic, $includeProtected, $includePrivate) {
            $visibility = (string)$item->getVisibility();
            return
                ($includePublic && $visibility === 'public') ||
                ($includeProtected && $visibility === 'protected') ||
                ($includePrivate && $visibility === 'private');
        });
    }
}
