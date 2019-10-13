<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver;

use phpDocumentor\Reflection\DocBlock;

class PropertyDocBlockResolver extends BaseDocBlockResolver
{
    protected static $inheritedTags = [
        'author',
        'copyright',
        'version',
        'var',
    ];

    public function resolve(): DocBlock
    {
        return $this->docBlock;
    }
}
