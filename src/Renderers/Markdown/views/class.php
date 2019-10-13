<?php

/**
 * @var $class \spaceonfire\SimplePhpApiDoc\Elements\ClassElement
 * @var $this \spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownRenderer
 */

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
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

$propertiesCollection = $class
    ->getProperties()
    ->filterByVisibility($this->getPropertiesVisibility())
    ->sortBy(static function (PropertyElement $property) {
        return $property->getName();
    });

if (!$propertiesCollection->isEmpty()) {
    $lines[] = '';
    $lines[] = MarkdownHelper::header('Properties', 2);

    $propertiesTable = [];
    $propertiesTable[] = ['Property', 'Type', 'Description', 'Default Value'];

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

    $lines[] = '';
    $lines = array_merge($lines, $propertiesTable);
}

$methodsCollection = $class
    ->getMethods()
    ->filterByVisibility($this->getMethodsVisibility())
    ->sortBy(static function (MethodElement $method) {
        return $method->getName();
    });

if (!$methodsCollection->isEmpty()) {
    $lines[] = '';
    $lines[] = MarkdownHelper::header('Methods', 2);

    /** @var MethodElement $method */
    foreach ($methodsCollection as $method) {
        $lines[] = '';
        $lines[] = MarkdownHelper::header($method->getName() . '()', 3);

        if ($docblock = $method->getDocBlock()) {
            $lines[] = '';

            if (($summary = trim($docblock->getSummary())) !== '') {
                $lines[] = $summary;
            }

            if (($description = trim((string)$docblock->getDescription())) !== '') {
                $lines[] = '';
                $lines[] = $description;
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
                $lines[] = '';
                $tagsTable = MarkdownHelper::table($tagsTable);
                foreach ($tagsTable as $row) {
                    $lines[] = $row;
                }
            }
        }

        $lines[] = '';
        $lines[] = MarkdownHelper::pre($method->getSignature(), 'php');
        $lines[] = '';
        $lines[] = 'File location: ' . MarkdownHelper::code($method->getFileLocation());
    }
}

echo implode(PHP_EOL, $lines);
