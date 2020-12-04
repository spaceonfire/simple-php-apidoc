<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;
use SlevomatCodingStandard\Sniffs\Functions\UnusedInheritedVariablePassedToClosureSniff;
use SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff;
use SlevomatCodingStandard\Sniffs\Variables\UnusedVariableSniff;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\CodingStandard\Fixer\LineLength\LineLengthFixer;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set('sets', [
        SetList::ARRAY,
        SetList::CLEAN_CODE,
        SetList::STRICT,
        SetList::PHP_70,
        SetList::PHP_71,
        SetList::PSR_12,
    ]);

    $parameters->set('cache_directory', __DIR__ . '/._ecs_cache');

    $parameters->set('paths', [
        __DIR__ . '/src',
    ]);

    $parameters->set('skip', [
        'Unused variable $_.' => null,
        'Unused parameter $_.' => null,
        'Unused parameter $input.' => [
            __DIR__ . '/src/Application/Console/GenerateCommand.php',
        ],
        'Unused parameter $output.' => [
            __DIR__ . '/src/Application/Console/GenerateCommand.php',
        ],
        'Unused parameter $reflection.' => [
            __DIR__ . '/src/Element/DocBlock/Resolver/AbstractDocBlockResolver.php',
        ],
        PhpCsFixer\Fixer\ClassNotation\ProtectedToPrivateFixer::class => [
            __DIR__ . '/src/Application/ApiDocKernel.php',
        ],
    ]);

    $services = $containerConfigurator->services();

    $services->set(LineLengthFixer::class)
        ->call('configure', [
            [
                LineLengthFixer::INLINE_SHORT_LINES => false,
            ],
        ]);
    $services->set(UnusedInheritedVariablePassedToClosureSniff::class);
    $services->set(UnusedParameterSniff::class);
    $services->set(UnusedVariableSniff::class);
    $services->set(YodaStyleFixer::class);
};
