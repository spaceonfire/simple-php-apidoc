<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc;

use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\File\LocalFile;
use phpDocumentor\Reflection\Php\Argument;
use phpDocumentor\Reflection\Php\Class_;
use phpDocumentor\Reflection\Php\Constant;
use phpDocumentor\Reflection\Php\File;
use phpDocumentor\Reflection\Php\Function_;
use phpDocumentor\Reflection\Php\Interface_;
use phpDocumentor\Reflection\Php\Method;
use phpDocumentor\Reflection\Php\Namespace_;
use phpDocumentor\Reflection\Php\Project;
use phpDocumentor\Reflection\Php\ProjectFactory;
use phpDocumentor\Reflection\Php\Property;
use phpDocumentor\Reflection\Php\Trait_;
use phpDocumentor\Reflection\Project as ProjectInterface;
use spaceonfire\SimplePhpApiDoc\Elements\ClassElement;
use Symfony\Component\Finder\Finder;

class Context
{
    /**
     * @var string
     */
    protected $projectName;
    /**
     * @var Finder
     */
    protected $finder;
    /**
     * @var Project|ProjectInterface
     */
    protected $project;
    /**
     * @var ClassElement[]
     */
    protected $classes;
    /**
     * @var Interface_[]
     */
    protected $interfaces;
    /**
     * @var Trait_[]
     */
    protected $traits;
    /**
     * @var Constant[]
     */
    protected $constants;
    /**
     * @var Function_[]
     */
    protected $functions;
    /**
     * @var array
     */
    protected $filesMap;

    /**
     * Context constructor.
     * @param string $projectName
     * @param Finder $finder
     * @throws \phpDocumentor\Reflection\Exception
     */
    public function __construct(string $projectName, Finder $finder)
    {
        $this->projectName = $projectName;
        $this->finder = $finder;
        $this->project = $this->buildProject();
    }

    /**
     * Build project instance from files in $this->finder
     * @return ProjectInterface
     * @throws \phpDocumentor\Reflection\Exception
     */
    protected function buildProject(): ProjectInterface
    {
        $projectFactory = ProjectFactory::createInstance();

        $files = [];
        foreach ($this->finder as $splFileInfo) {
            $files[] = new LocalFile($splFileInfo->getRealPath());
        }

        return $projectFactory->create($this->projectName, $files);
    }

    /**
     * Getter for `project` property
     * @return Project|ProjectInterface
     */
    public function getProject(): ProjectInterface
    {
        return $this->project;
    }

    public function elementFactory($element)
    {
        $map = [
            Argument::class => Elements\ArgumentElement::class,
            Class_::class => Elements\ClassElement::class,
            Constant::class => Elements\ConstantElement::class,
            Property::class => Elements\PropertyElement::class,
            Method::class => Elements\MethodElement::class,
        ];

        if (!isset($map[get_class($element)])) {
            return $element;
        }

        $class = $map[get_class($element)];

        return new $class($element, $this);
    }

    /**
     * Proxy method call to project instance
     * @param string $method Method name to proxy
     * @param array $arguments Arguments to proxy with
     * @return mixed
     */
    protected function proxyProject(string $method, array $arguments)
    {
        return call_user_func_array([$this->project, $method], $arguments);
    }

    /**
     * Returns all namespaces with their sub-elements.
     * @return Namespace_[]
     */
    public function getNamespaces(): array
    {
        return $this->proxyProject(__FUNCTION__, func_get_args());
    }

    /**
     * @param string $method
     * @return Element[]
     */
    protected function buildMap(string $method): array
    {
        $map = [];
        foreach ($this->project->getFiles() as $file) {
            /** @var Element $_element */
            foreach ($file->$method() as $_element) {
                $element = $this->elementFactory($_element);
                $map[(string)$element->getFqsen()] = $element;
                $this->filesMap[(string)$element->getFqsen()] = $file;
            }
        }
        return $map;
    }

    /**
     * Returns a list of class descriptors contained in project files.
     * @return ClassElement[]
     */
    public function getClasses(): array
    {
        if ($this->classes === null) {
            $this->classes = $this->buildMap(__FUNCTION__);
        }

        return $this->classes;
    }

    /**
     * Returns a list of interface descriptors contained in project files.
     * @return Interface_[]
     */
    public function getInterfaces(): array
    {
        if ($this->interfaces === null) {
            $this->interfaces = $this->buildMap(__FUNCTION__);
        }

        return $this->interfaces;
    }

    /**
     * Returns a list of trait descriptors contained in project files.
     * @return Trait_[]
     */
    public function getTraits(): array
    {
        if ($this->traits === null) {
            $this->traits = $this->buildMap(__FUNCTION__);
        }

        return $this->traits;
    }

    /**
     * Returns a list of constant descriptors contained in project files.
     * @return Constant[]
     */
    public function getConstants(): array
    {
        if ($this->constants === null) {
            $this->constants = $this->buildMap(__FUNCTION__);
        }

        return $this->constants;
    }

    /**
     * Returns a list of function descriptors contained in project files.
     * @return Function_[]
     */
    public function getFunctions(): array
    {
        if ($this->functions === null) {
            $this->functions = $this->buildMap(__FUNCTION__);
        }

        return $this->functions;
    }

    /**
     * Get file by element name
     * @param string $fqsen Fully Qualified Structural Element Name
     * @return File|null
     */
    public function getFile(string $fqsen): ?File
    {
        return $this->filesMap[$fqsen];
    }

    /**
     * Get element object by name
     * @param string $fqsen Fully Qualified Structural Element Name
     * @return Element|mixed|null
     */
    public function getElement(string $fqsen)
    {
        $order = [
            'classes',
            'interfaces',
            'traits',
            'constants',
            'functions',
        ];

        foreach ($order as $item) {
            if ($this->$item === null) {
                $this->{'get' . ucfirst($item)}();
            }
            if (isset($this->$item[$fqsen])) {
                return $this->$item[$fqsen];
            }
        }

        return null;
    }
}
