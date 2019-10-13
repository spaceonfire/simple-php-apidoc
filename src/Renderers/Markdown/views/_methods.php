<?php

/**
 * @var $methodsCollection \spaceonfire\SimplePhpApiDoc\Elements\Collections\MethodsCollection
 */

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use spaceonfire\SimplePhpApiDoc\Elements\MethodElement;
use spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownHelper;

$methodsLines[] = MarkdownHelper::header('Methods', 2);

/** @var MethodElement $method */
foreach ($methodsCollection as $method) {
    $methodsLines[] = '';
    $methodsLines[] = MarkdownHelper::header($method->getName() . '()', 3);

    if ($docblock = $method->getDocBlock()) {
        $methodsLines[] = '';

        if (($summary = trim($docblock->getSummary())) !== '') {
            $methodsLines[] = $summary;
        }

        if (($description = trim((string)$docblock->getDescription())) !== '') {
            $methodsLines[] = '';
            $methodsLines[] = $description;
        }

        $tagsTable = [['Param', 'Type', 'Description']];
        foreach ($docblock->getTags() as $tag) {
            switch ($tag->getName()) {
                case 'param':
                    /** @var Param $tag */
                    $tagsTable[] = [
                        MarkdownHelper::code(($tag->isVariadic() ? '...' : '') . '$' . $tag->getVariableName()),
                        $tag->getType() ? MarkdownHelper::italic((string)$tag->getType()) : null,
                        (string)$tag->getDescription(),
                    ];
                    break;

                case 'return':
                    /** @var Return_ $tag */
                    $tagsTable[] = [
                        MarkdownHelper::strong('Return'),
                        $tag->getType() ? MarkdownHelper::italic((string)$tag->getType()) : null,
                        (string)$tag->getDescription(),
                    ];
                    break;

                case 'throw':
                    /** @var Throws $tag */
                    $tagsTable[] = [
                        MarkdownHelper::strong('Throws'),
                        $tag->getType() ? MarkdownHelper::italic((string)$tag->getType()) : null,
                        (string)$tag->getDescription(),
                    ];
                    break;
            }
        }

        if (count($tagsTable) > 1) {
            $methodsLines[] = '';
            $tagsTable = MarkdownHelper::table($tagsTable);
            foreach ($tagsTable as $row) {
                $methodsLines[] = $row;
            }
        }
    }

    $methodsLines[] = '';
    $methodsLines[] = MarkdownHelper::pre($method->getSignature(), 'php');
    $methodsLines[] = '';
    $methodsLines[] = 'File location: ' . MarkdownHelper::code($method->getFileLocation());
}

return $methodsLines;
