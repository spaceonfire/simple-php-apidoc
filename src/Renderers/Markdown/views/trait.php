<?php

/**
 * @var $trait \spaceonfire\SimplePhpApiDoc\Elements\TraitElement
 * @var $this \spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownRenderer
 */

use spaceonfire\SimplePhpApiDoc\Elements\MethodElement;
use spaceonfire\SimplePhpApiDoc\Elements\PropertyElement;
use spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownHelper;

$lines = [
    MarkdownHelper::header('Class ' . $trait->getName()),
];

if ($docblock = $trait->getDocBlock()) {
    $docblockLines = include __DIR__ . '/_docblock.php';
    $lines[] = '';
    $lines = array_merge($lines, $docblockLines);
}

$infoList = [
    'Full name: ' . MarkdownHelper::code($trait->getFqsen()),
];

if (!empty($trait->getUsedTraitsFqsen())) {
    $implementsList = array_map(static function ($interface) {
        return MarkdownHelper::code($interface);
    }, $trait->getUsedTraitsFqsen());

    if (count($implementsList) === 1) {
        $infoList[] = 'This trait uses: ' . reset($implementsList);
    } else {
        $infoList[] = 'This trait uses:';
        $infoList[] = MarkdownHelper::ul($implementsList);
    }
}

$lines[] = '';
$lines = array_merge($lines, MarkdownHelper::ul($infoList));

$propertiesCollection = $trait
    ->getProperties()
    ->filterByVisibility($this->getPropertiesVisibility())
    ->sortBy(static function (PropertyElement $property) {
        return $property->getName();
    });

if (!$propertiesCollection->isEmpty()) {
    $propertiesLines = include __DIR__ . '/_properties.php';
    $lines[] = '';
    $lines = array_merge($lines, $propertiesLines);
}

$methodsCollection = $trait
    ->getMethods()
    ->filterByVisibility($this->getMethodsVisibility())
    ->sortBy(static function (MethodElement $method) {
        return $method->getName();
    });

if (!$methodsCollection->isEmpty()) {
    $methodsLines = include __DIR__ . '/_methods.php';
    $lines[] = '';
    $lines = array_merge($lines, $methodsLines);
}

echo implode(PHP_EOL, $lines);
