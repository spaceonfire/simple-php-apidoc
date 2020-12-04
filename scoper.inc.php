<?php

declare(strict_types=1);

use Isolated\Symfony\Component\Finder\Finder;

$whitelistFiles = Finder::create();

// Exclude symfony polyfills bootstrap files from prefixing
$whitelistFiles->append(
    Finder::create()
        ->files()
        ->in(__DIR__ . '/vendor/symfony/polyfill-*')
        ->name('bootstrap.php')
);

// Exclude PhpStorm Stub files from prefixing
$whitelistFiles->append(
    Finder::create()
        ->files()
        ->in(__DIR__ . '/vendor/jetbrains/phpstorm-stubs/')
        ->name('*.php')
);

return [
    'whitelist' => [
        'spaceonfire\\ApiDoc\\*',
        'Symfony\\Polyfill\\*',
        'JetBrains\\PHPStormStub\\*',
        'Twig\\*',
    ],
    'files-whitelist' => array_map(
        static function ($file) {
            return $file->getPathName();
        },
        iterator_to_array($whitelistFiles)
    ),
    'patchers' => [
        function (string $filePath, string $prefix, string $content): string {
            $files = [
                'src/Config/Processor/ComposerJsonProcessor.php',
                'src/Config/Config.php',
                'vendor/laminas/laminas-zendframework-bridge/src/Autoloader.php',
                'vendor/roave/better-reflection/src/SourceLocator/Type/ComposerSourceLocator.php',
            ];

            if (!in_array($filePath, $files, true)) {
                return $content;
            }

            return str_replace(
                $prefix . '\\Composer\\Autoload\\ClassLoader',
                'Composer\\Autoload\\ClassLoader',
                $content
            );
        },
    ],
];
