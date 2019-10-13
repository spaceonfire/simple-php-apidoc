<?php

/**
 * @var $interface \spaceonfire\SimplePhpApiDoc\Elements\InterfaceElement
 * @var $this \spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownRenderer
 */

use spaceonfire\SimplePhpApiDoc\Elements\MethodElement;
use spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownHelper;

$lines = [
    MarkdownHelper::header('Interface ' . $interface->getName()),
];

if ($docblock = $interface->getDocBlock()) {
    $docblockLines = include __DIR__ . '/_docblock.php';
    $lines[] = '';
    $lines = array_merge($lines, $docblockLines);
}

$infoList = [
    'Full name: ' . MarkdownHelper::code($interface->getFqsen()),
];
if (!empty($interface->getParents())) {
    $implementsList = array_map(static function ($interface) {
        return MarkdownHelper::code($interface);
    }, $interface->getParents());

    if (count($implementsList) === 1) {
        $infoList[] = 'This interface extends: ' . reset($implementsList);
    } else {
        $infoList[] = 'This interface extends:';
        $infoList[] = MarkdownHelper::ul($implementsList);
    }
}

$lines[] = '';
$lines = array_merge($lines, MarkdownHelper::ul($infoList));

if (!empty($constants = $interface->getConstants())) {
    $constantsLines = include __DIR__ . '/_constants.php';
    $lines[] = '';
    $lines = array_merge($lines, $constantsLines);
}

$methodsCollection = $interface
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
