<?php

/**
 * @var $docblock phpDocumentor\Reflection\DocBlock
 */

use spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownHelper;

$docblockLines = [];

if (($summary = trim($docblock->getSummary())) !== '') {
    $docblockLines[] = $summary;
}

if (($description = trim((string)$docblock->getDescription())) !== '') {
    $docblockLines[] = '';
    $docblockLines[] = $description;
}

$tagsList = [];
foreach ($docblock->getTags() as $tag) {
    switch ($tag->getName()) {
        case 'deprecated':
            $content = trim($tag) !== '' ?
                $tag :
                '**Warning:** this class is **deprecated**. ' .
                'This means that this class will likely be removed in a future version.';
            break;
    }

    if (!isset($content)) {
        continue;
    }

    $tagsList[] = $content;
}

if (!empty($tagsList)) {
    $docblockLines[] = '';
    $docblockLines = array_merge($docblockLines, MarkdownHelper::ul($tagsList));
}

return $docblockLines;
