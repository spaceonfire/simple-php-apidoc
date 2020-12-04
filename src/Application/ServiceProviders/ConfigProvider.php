<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\ServiceProviders;

use PhpParser\Lexer\Emulative;
use PhpParser\Parser as PhpParser;
use PhpParser\ParserFactory;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\ClassReflector;
use Roave\BetterReflection\Reflector\ConstantReflector;
use Roave\BetterReflection\Reflector\FunctionReflector;
use Roave\BetterReflection\SourceLocator\Ast\Parser\MemoizingParser;
use Roave\BetterReflection\SourceLocator\Type\AggregateSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\AutoloadSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\ComposerSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\DirectoriesSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\PhpInternalSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SingleFileSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;
use spaceonfire\ApiDoc\Config\Config;
use spaceonfire\ApiDoc\Config\Processor\ComposerJsonProcessor;
use spaceonfire\ApiDoc\Config\Processor\ConfigFileProcessor;
use spaceonfire\ApiDoc\Config\Processor\ConsoleInputProcessor;
use spaceonfire\ApiDoc\Config\Processor\DefaultsProcessor;
use spaceonfire\ApiDoc\Config\Processor\ProcessorInterface;
use spaceonfire\ApiDoc\Element\Example\ExampleCodeSnippetResolver;
use spaceonfire\ApiDoc\Element\Location\LocationFactory;
use spaceonfire\ApiDoc\Element\ValueObject\ClassMembersVisibilityFilter;
use spaceonfire\ApiDoc\Element\ValueObject\Visibility;
use spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter;
use spaceonfire\ApiDoc\Generator\FileNameStrategy;
use spaceonfire\ApiDoc\Generator\FileNameStrategyInterface;
use spaceonfire\ApiDoc\Generator\LocalFilesystemPersister;
use spaceonfire\ApiDoc\Generator\PersisterInterface;
use spaceonfire\ApiDoc\Render\Twig\DumpExtension;
use spaceonfire\ApiDoc\Render\Twig\ExampleRendererExtension;
use spaceonfire\ApiDoc\Render\Twig\LinkExtension;
use spaceonfire\ApiDoc\Render\Twig\MarkdownExtension;
use spaceonfire\ApiDoc\Render\Twig\SignatureExtension;
use spaceonfire\Container\ServiceProvider\AbstractServiceProvider;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Component\Console\Input\InputInterface;
use Twig\Environment;
use Twig\Environment as TwigEnvironment;
use Twig\Loader\FilesystemLoader;

final class ConfigProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function provides(): array
    {
        return [
            Config::class,
            FileNameStrategyInterface::class,
            FileNameStrategy::class,
            PersisterInterface::class,
            LocalFilesystemPersister::class,
            PhpParser::class,
            BetterReflection::class,
            SourceLocator::class,
            ClassReflector::class,
            FunctionReflector::class,
            ConstantReflector::class,
            TwigEnvironment::class,
            ExampleCodeSnippetResolver::class,
            LocationFactory::class,
            ClassMembersVisibilityFilter::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->getContainer()->share(Config::class, [$this, 'makeConfig']);

        $this->getContainer()->add(FileNameStrategyInterface::class, FileNameStrategy::class);
        $this->getContainer()->add(PersisterInterface::class, LocalFilesystemPersister::class);

        $this->getContainer()->share(PhpParser::class, [$this, 'makePhpParser']);
        $this->getContainer()->share(BetterReflection::class, [$this, 'makeBetterReflection']);
        $this->getContainer()->share(SourceLocator::class, [$this, 'makeSourceLocator']);
        $this->getContainer()->share(ClassReflector::class, [$this, 'makeClassReflector']);
        $this->getContainer()->share(FunctionReflector::class, [$this, 'makeFunctionReflector']);
        $this->getContainer()->share(ConstantReflector::class, [$this, 'makeConstantReflector']);
        $this->getContainer()->share(FileNameStrategy::class, [$this, 'makeFilenameStrategy']);
        $this->getContainer()->share(LocalFilesystemPersister::class, [$this, 'makePersister']);
        $this->getContainer()->share(TwigEnvironment::class, [$this, 'makeTwig']);
        $this->getContainer()->share(ExampleCodeSnippetResolver::class, [$this, 'makeExampleCodeSnippetResolver']);
        $this->getContainer()->share(LocationFactory::class, [$this, 'makeLocationFactory']);
        $this->getContainer()->share(ClassMembersVisibilityFilter::class, [$this, 'makeClassMembersVisibilityFilter']);
    }

    public function makeConfig(): Config
    {
        $config = new Config();

        foreach ($this->makeConfigProcessors() as $processor) {
            $processor->process($config);
        }

        // TODO: validate config

        return $config;
    }

    /**
     * @return \Generator<ProcessorInterface>|ProcessorInterface[]
     */
    private function makeConfigProcessors(): \Generator
    {
        yield new DefaultsProcessor($this->getContainer()->get('kernel.debug'));

        $input = $this->getContainer()->has(InputInterface::class)
            ? $this->getContainer()->get(InputInterface::class)
            : null;

        if (null !== $composerJsonFile = $this->findComposerJsonFile()) {
            yield new ComposerJsonProcessor($composerJsonFile);
        }

        if (null !== $configFile = $this->findConfigFile($input)) {
            yield new ConfigFileProcessor($configFile);
        }

        if (null !== $input) {
            yield new ConsoleInputProcessor($input);
        }
    }

    private function findConfigFile(?InputInterface $input): ?string
    {
        /** @var string|null $configFile */
        $configFile = $input && $input->hasOption('config')
            ? $input->getOption('config')
            : null;

        $configFile = realpath($configFile ?? ConfigFileProcessor::DEFAULT_CONFIG_FILENAME);

        return $configFile ?: null;
    }

    private function findComposerJsonFile(): ?string
    {
        $composerJson = realpath(getcwd() . DIRECTORY_SEPARATOR . 'composer.json');

        if (false !== $composerJson) {
            return $composerJson;
        }

        return null;
    }

    public function makePhpParser(Config $config): PhpParser
    {
        return new MemoizingParser(
            (new ParserFactory())->create(ParserFactory::PREFER_PHP7, new Emulative([
                'phpVersion' => $config->phpVersion,
                'usedAttributes' => ['comments', 'startLine', 'endLine', 'startFilePos', 'endFilePos'],
            ]))
        );
    }

    public function makeBetterReflection(PhpParser $phpParser): BetterReflection
    {
        $betterReflection = new BetterReflection();

        (function ($betterReflection) use ($phpParser): void {
            $betterReflection->phpParser = $phpParser;
        })->bindTo($betterReflection, BetterReflection::class)($betterReflection);

        return $betterReflection;
    }

    public function makeSourceLocator(Config $config, BetterReflection $betterReflection): SourceLocator
    {
        $astLocator = $betterReflection->astLocator();
        $sourceStubber = $betterReflection->sourceStubber();

        $locators = [];
        $locators[] = new PhpInternalSourceLocator($astLocator, $sourceStubber);

        if (null !== $config->composerClassLoader) {
            $locators[] = new ComposerSourceLocator($config->composerClassLoader, $astLocator);
        }

        $locators[] = new AutoloadSourceLocator($astLocator, $betterReflection->phpParser());

        // TODO: directories source locator is slow. We need to try to speedup or cache it.
        $locators[] = new DirectoriesSourceLocator(
            array_unique(array_merge($config->sourceDirectories, $config->scanDirectories)),
            $astLocator
        );

        if (count($config->scanFiles) > 0) {
            foreach ($config->scanFiles as $file) {
                $locators[] = new SingleFileSourceLocator($file, $astLocator);
            }
        }

        return new MemoizingSourceLocator(new AggregateSourceLocator($locators));
    }

    public function makeClassReflector(SourceLocator $sourceLocator): ClassReflector
    {
        return new ClassReflector($sourceLocator);
    }

    public function makeFunctionReflector(
        SourceLocator $sourceLocator,
        ClassReflector $classReflector
    ): FunctionReflector {
        return new FunctionReflector($sourceLocator, $classReflector);
    }

    public function makeConstantReflector(
        SourceLocator $sourceLocator,
        ClassReflector $classReflector
    ): ConstantReflector {
        return new ConstantReflector($sourceLocator, $classReflector);
    }

    public function makeFilenameStrategy(Config $config): FileNameStrategyInterface
    {
        return new FileNameStrategy($config->baseNamespace, $config->fileExtension);
    }

    public function makePersister(Config $config): PersisterInterface
    {
        return new LocalFilesystemPersister($config->outputDirectory);
    }

    public function makeTwig(Config $config): TwigEnvironment
    {
        $twig = new Environment(new FilesystemLoader($config->twigTemplatesPath), $config->twigOptions);

        $twig->addGlobal('project_name', $config->projectName);

        $twig->addExtension(new DumpExtension());
        $twig->addExtension(new MarkdownExtension());
        $twig->addExtension($this->getContainer()->make(LinkExtension::class));
        $twig->addExtension($this->getContainer()->make(TranslationExtension::class));
        $twig->addExtension($this->getContainer()->make(SignatureExtension::class));
        $twig->addExtension($this->getContainer()->make(ExampleRendererExtension::class));

        return $twig;
    }

    public function makeExampleCodeSnippetResolver(Config $config): ExampleCodeSnippetResolver
    {
        return new ExampleCodeSnippetResolver($config->examplesDirectories);
    }

    public function makeLocationFactory(Config $config): LocationFactory
    {
        return new LocationFactory($config->sourceDirectories);
    }

    public function makeClassMembersVisibilityFilter(Config $config): ClassMembersVisibilityFilter
    {
        $visibilityFactory = static function ($v) {
            return new Visibility($v);
        };

        $defaultVisibilityFilter = new VisibilityFilter(...array_map($visibilityFactory, $config->visibility));
        $constantsVisibilityFilter = count($config->constantsVisibility) > 0
            ? new VisibilityFilter(...array_map($visibilityFactory, $config->constantsVisibility))
            : null;
        $propertiesVisibilityFilter = count($config->propertiesVisibility) > 0
            ? new VisibilityFilter(...array_map($visibilityFactory, $config->propertiesVisibility))
            : null;
        $methodsVisibilityFilter = count($config->methodsVisibility) > 0
            ? new VisibilityFilter(...array_map($visibilityFactory, $config->methodsVisibility))
            : null;

        return new ClassMembersVisibilityFilter(
            $defaultVisibilityFilter,
            $constantsVisibilityFilter,
            $propertiesVisibilityFilter,
            $methodsVisibilityFilter
        );
    }
}
