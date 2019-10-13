<?php

/**
 * @var $propertiesCollection \spaceonfire\SimplePhpApiDoc\Elements\Collections\PropertiesCollection
 */

use spaceonfire\SimplePhpApiDoc\Elements\PropertyElement;
use spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownHelper;

$propertiesTable = [];
$propertiesTable[] = ['Property', 'Type', 'Description', 'Default Value'];

/** @var PropertyElement $property */
foreach ($propertiesCollection as $property) {
    $types = $property->getTypes();
    $propertiesTable[] = [
        MarkdownHelper::code($property->getVisibility() . ($property->isStatic() ? ' static' : '') . ' $' . $property->getName()),
        empty($types) ? '' : '<code>' . implode('&#124;', $types) . '</code>',
        str_replace(PHP_EOL, ' ', $property->getDescription()),
        $property->getDefault() ?? ''
    ];
}

$propertiesTable = MarkdownHelper::table($propertiesTable);

return array_merge([
    MarkdownHelper::header('Properties', 2),
    '',
], $propertiesTable);
