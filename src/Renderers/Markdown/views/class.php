<?php

/**
 * @var $class \spaceonfire\SimplePhpApiDoc\Elements\ClassElement
 * @var $this \spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownRenderer
 */

use spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownHelper;

$lines = [
    MarkdownHelper::header($class->getName()),
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
    $infoList[] = 'This class implements:';
    $implementsList = array_map(static function ($interface) {
        return MarkdownHelper::code($interface);
    }, $class->getInterfaces());
    $implementsList = MarkdownHelper::ul($implementsList);
    $infoList[] = $implementsList;
}

$lines[] = '';
$lines = array_merge($lines, MarkdownHelper::ul($infoList));

if (!empty($class->getConstants())) {
    $lines[] = '';
    $lines[] = MarkdownHelper::header('Constants', 2);

    foreach ($class->getConstants() as $constant) {
        $lines[] = '';
        $lines[] = MarkdownHelper::header(MarkdownHelper::code($constant->getName() . '=' . $constant->getValue()), 3);

        if ($docblock = $constant->getDocBlock()) {
            $docblockLines = include __DIR__ . '/_docblock.php';
            foreach ($docblockLines as $docblockLine) {
                $lines[] = $docblockLine;
            }
        }
    }
}

if (!empty($class->getProperties())) {
    $lines[] = '';
    $lines[] = MarkdownHelper::header('Properties', 2);

    foreach ($class->getProperties() as $property) {
        $lines[] = '';
        $lines[] = MarkdownHelper::header($property->getName(), 3);
        $lines[] = '';
        $lines[] = $property->getVisibility() . ($property->isStatic() ? ' static' : '') . ' property';

        if (($desc = $property->getDescription()) !== '') {
            $lines[] = '';
            $lines[] = $property->getDescription();
        }
    }
}

if (!empty($class->getMethods())) {
    $lines[] = '';
    $lines[] = MarkdownHelper::header('Methods', 2);

    foreach ($class->getMethods() as $method) {
        $lines[] = '';
        $lines[] = MarkdownHelper::header($method->getName(), 3);

        if ($docblock = $method->getDocBlock()) {
            $lines[] = '';
            $docblockLines = include __DIR__ . '/_docblock.php';
            foreach ($docblockLines as $docblockLine) {
                $lines[] = $docblockLine;
            }
        }

        $lines[] = '';
        $lines[] = MarkdownHelper::pre($method->getSignature(), 'php');
        $lines[] = '';
        $lines[] = 'File location: ' . MarkdownHelper::code($method->getFileLocation());
    }
}

echo implode(PHP_EOL, $lines);
