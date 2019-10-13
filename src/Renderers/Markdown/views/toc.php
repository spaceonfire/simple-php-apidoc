<?php

/**
 * @var $context \spaceonfire\SimplePhpApiDoc\Context
 * @var $this \spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownRenderer
 */

use phpDocumentor\Reflection\Fqsen;
use spaceonfire\SimplePhpApiDoc\Renderers\Markdown\MarkdownHelper;

$lines = [];
$lines[] = MarkdownHelper::header($context->getProject()->getName() . ' API Documentation');

$tocList = [];

$getFileName = Closure::fromCallable([$this, 'getFileName']);

$fqsenToLink = static function (Fqsen $fqsen, bool $isDir = false) use ($getFileName): string {
    $path = './' . ltrim(str_replace('\\', '/', (string)$fqsen), '/\\');
    if (!$isDir) {
        $path = str_replace($fqsen->getName(), $getFileName($fqsen), $path);
    }
    return $path;
};

/** @var \spaceonfire\SimplePhpApiDoc\Elements\NamespaceElement $namespace */
foreach ($context->getNamespaces() as $namespace) {
    $tocList[] = MarkdownHelper::link(
        $namespace->getFqsen(),
        $fqsenToLink($namespace->getFqsen(), true)
    );

    $classesList = MarkdownHelper::ul(array_map(static function (Fqsen $fqsen) use ($fqsenToLink) {
        return MarkdownHelper::link(
            $fqsen->getName(),
            $fqsenToLink($fqsen)
        );
    }, $namespace->getClasses()));

    $interfacesList = MarkdownHelper::ul(array_map(static function (Fqsen $fqsen) use ($fqsenToLink) {
        return MarkdownHelper::link(
            $fqsen->getName(),
            $fqsenToLink($fqsen)
        );
    }, $namespace->getInterfaces()));

    $traitsList = MarkdownHelper::ul(array_map(static function (Fqsen $fqsen) use ($fqsenToLink) {
        return MarkdownHelper::link(
            $fqsen->getName(),
            $fqsenToLink($fqsen)
        );
    }, $namespace->getTraits()));

    $itemsList = [];
    if (!empty($classesList)) {
        $itemsList[] = 'Classes';
        $itemsList[] = $classesList;
    }
    if (!empty($interfacesList)) {
        $itemsList[] = 'Interfaces';
        $itemsList[] = $interfacesList;
    }
    if (!empty($traitsList)) {
        $itemsList[] = 'Traits';
        $itemsList[] = $traitsList;
    }

    $tocList[] =  MarkdownHelper::ul($itemsList);
}

$tocList = MarkdownHelper::ul($tocList);

$lines[] = '';
$lines = array_merge($lines, $tocList);

$footerLines = include __DIR__ . '/_footer.php';
$lines = array_merge($lines, $footerLines);

echo implode(PHP_EOL, $lines);
