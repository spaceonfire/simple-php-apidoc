<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\DocBlockResolver;

use phpDocumentor\Reflection\DocBlock;

class InterfaceDocBlockResolver extends BaseDocBlockResolver
{
    protected static $inheritedTags = [
        'author',
        'copyright',
        'package',
        'subpackage',
        'version',
    ];

    public function resolve(): DocBlock
    {
        return $this->docBlock;
    }
}
