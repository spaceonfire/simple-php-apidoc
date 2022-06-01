<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Project;

use Generator;
use Roave\BetterReflection\Reflector\ClassReflector;
use Roave\BetterReflection\Reflector\ConstantReflector;
use Roave\BetterReflection\Reflector\FunctionReflector;
use spaceonfire\ApiDoc\Config\Config;
use spaceonfire\ApiDoc\Element\ConstantElement;
use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\Factory\ElementFactoryInterface;
use spaceonfire\ApiDoc\Element\FunctionElement;

final class ProjectFactory
{
    /**
     * @var ElementFactoryInterface
     */
    private $elementFactory;
    /**
     * @var ClassReflector
     */
    private $classReflector;
    /**
     * @var FunctionReflector
     */
    private $functionReflector;
    /**
     * @var ConstantReflector
     */
    private $constantReflector;

    /**
     * ProjectFactory constructor.
     * @param ElementFactoryInterface $elementFactory
     * @param ClassReflector $classReflector
     * @param FunctionReflector $functionReflector
     * @param ConstantReflector $constantReflector
     */
    public function __construct(
        ElementFactoryInterface $elementFactory,
        ClassReflector $classReflector,
        FunctionReflector $functionReflector,
        ConstantReflector $constantReflector
    ) {
        $this->elementFactory = $elementFactory;
        $this->classReflector = $classReflector;
        $this->functionReflector = $functionReflector;
        $this->constantReflector = $constantReflector;
    }

    /**
     * @param Config $config
     * @return Project
     */
    public function make(Config $config): Project
    {
        return new Project(
            $config->projectName,
            $this->makeClassLikeElements($this->classReflector, $config),
            $this->makeFunctionElements($this->functionReflector, $config),
            $this->makeConstantElements($this->constantReflector, $config)
        );
    }

    /**
     * @param ClassReflector $reflector
     * @param Config $config
     * @return Generator<ElementInterface>|ElementInterface[]
     */
    private function makeClassLikeElements(ClassReflector $reflector, Config $config): Generator
    {
        foreach ($reflector->getAllClasses() as $reflectionClass) {
            if ($reflectionClass->isAnonymous() || $reflectionClass->isInternal()) {
                continue;
            }

            if (
                null === $reflectionClass->getFileName()
                || !$this->fileContainedInDirectories($reflectionClass->getFileName(), $config->sourceDirectories)
            ) {
                continue;
            }

            if (!$this->elementFactory->supports($reflectionClass)) {
                continue;
            }

            yield $this->elementFactory->make($reflectionClass);
        }
    }

    /**
     * @param FunctionReflector $functionReflector
     * @param Config $config
     * @return Generator<FunctionElement>|FunctionElement[]
     */
    private function makeFunctionElements(FunctionReflector $functionReflector, Config $config): Generator
    {
        foreach ($functionReflector->getAllFunctions() as $reflectionFunction) {
            if ($reflectionFunction->isInternal()) {
                continue;
            }

            if (
                null === $reflectionFunction->getFileName()
                || !$this->fileContainedInDirectories($reflectionFunction->getFileName(), $config->sourceDirectories)
            ) {
                continue;
            }

            if (!$this->elementFactory->supports($reflectionFunction)) {
                continue;
            }

            yield $this->elementFactory->make($reflectionFunction);
        }
    }

    /**
     * @param ConstantReflector $constantReflector
     * @param Config $config
     * @return Generator<ConstantElement>|ConstantElement[]
     */
    private function makeConstantElements(ConstantReflector $constantReflector, Config $config): Generator
    {
        foreach ($constantReflector->getAllConstants() as $reflectionConstant) {
            if ($reflectionConstant->isInternal()) {
                continue;
            }

            if (
                null === $reflectionConstant->getFileName()
                || !$this->fileContainedInDirectories($reflectionConstant->getFileName(), $config->sourceDirectories)
            ) {
                continue;
            }

            if (!$this->elementFactory->supports($reflectionConstant)) {
                continue;
            }

            yield $this->elementFactory->make($reflectionConstant);
        }
    }

    /**
     * @param string $filename
     * @param string[] $directories
     * @return bool
     */
    private function fileContainedInDirectories(string $filename, array $directories): bool
    {
        foreach ($directories as $directory) {
            if (str_starts_with($filename, $directory)) {
                return true;
            }
        }

        return false;
    }
}
