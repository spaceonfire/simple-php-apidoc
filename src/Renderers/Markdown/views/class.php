<?php

/**
 * @var $class \spaceonfire\SimplePhpApiDoc\Elements\ClassElement
 * @var $this \spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownRenderer
 */

use spaceonfire\SimplePhpApiDoc\Elements\MethodElement;
use spaceonfire\SimplePhpApiDoc\Elements\PropertyElement;
use spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownHelper;

$lines = [
    MarkdownHelper::header('Class ' . $class->getName()),
];

if ($docblock = $class->getDocBlock()) {
    $docblockLines = include __DIR__ . '/_docblock.php';
    $lines[] = '';
    $lines = array_merge($lines, $docblockLines);
}

$infoList = [
    'Full name: ' . MarkdownHelper::code($class->getFqsen()),
];
if ($parent = $class->getParent()) {
    $infoList[] = 'Parent class: ' . MarkdownHelper::code($parent->getFqsen());
}
if (!empty($class->getInterfaces())) {
    $implementsList = array_map(static function ($interface) {
        return MarkdownHelper::code($interface);
    }, $class->getInterfaces());

    if (count($implementsList) === 1) {
        $infoList[] = 'This class implements: ' . reset($implementsList);
    } else {
        $infoList[] = 'This class implements:';
        $infoList[] = MarkdownHelper::ul($implementsList);
    }
}
if (!empty($class->getUsedTraitsFqsen())) {
    $implementsList = array_map(static function ($interface) {
        return MarkdownHelper::code($interface);
    }, $class->getUsedTraitsFqsen());

    if (count($implementsList) === 1) {
        $infoList[] = 'This class uses: ' . reset($implementsList);
    } else {
        $infoList[] = 'This class uses:';
        $infoList[] = MarkdownHelper::ul($implementsList);
    }
}

$lines[] = '';
$lines = array_merge($lines, MarkdownHelper::ul($infoList));

if (!empty($constants = $class->getConstants())) {
    $constantsLines = include __DIR__ . '/_constants.php';
    $lines[] = '';
    $lines = array_merge($lines, $constantsLines);
}

$propertiesCollection = $class
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

$methodsCollection = $class
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

$footerLines = include __DIR__ . '/_footer.php';
$lines = array_merge($lines, $footerLines);

echo implode(PHP_EOL, $lines);
