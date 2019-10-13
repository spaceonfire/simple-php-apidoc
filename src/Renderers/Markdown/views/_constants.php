<?php

/**
 * @var $constants \spaceonfire\SimplePhpApiDoc\Elements\ConstantElement[]
 */

use spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownHelper;

$constantsTable = [['Constant', 'Value', 'Description']];

foreach ($constants as $constant) {
    $description = '';
    if ($docBlock = $constant->getDocBlock()) {
        $description = implode('. ', array_filter([
            trim($docBlock->getSummary()),
            trim((string)$docBlock->getDescription()),
        ]));
    }

    $constantsTable[] = [
        MarkdownHelper::code($constant->getName()),
        MarkdownHelper::code($constant->getValue()),
        $description,
    ];
}

return array_merge(
    [
        MarkdownHelper::header('Constants', 2),
        '',
    ],
    MarkdownHelper::table($constantsTable)
);
