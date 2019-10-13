<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc;

use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\File\LocalFile;
use phpDocumentor\Reflection\Php as PhpdocReflectionElements;
use phpDocumentor\Reflection\Php\File;
use phpDocumentor\Reflection\Php\Project;
use phpDocumentor\Reflection\Php\ProjectFactory;
use phpDocumentor\Reflection\Project as ProjectInterface;
use spaceonfire\SimplePhpApiDoc\Elements\ClassElement;
use spaceonfire\SimplePhpApiDoc\Elements\Collections\NamespacesCollection;
use spaceonfire\SimplePhpApiDoc\Elements\ConstantElement;
use spaceonfire\SimplePhpApiDoc\Elements\ElementInterface;
use spaceonfire\SimplePhpApiDoc\Elements\FunctionElement;
use spaceonfire\SimplePhpApiDoc\Elements\InterfaceElement;
use spaceonfire\SimplePhpApiDoc\Elements\NamespaceElement;
use spaceonfire\SimplePhpApiDoc\Elements\TraitElement;
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
     * @var InterfaceElement[]
     */
    protected $interfaces;
    /**
     * @var TraitElement[]
     */
    protected $traits;
    /**
     * @var ConstantElement[]
     */
    protected $constants;
    /**
     * @var NamespacesCollection
     */
    protected $namespaces;
    /**
     * @var FunctionElement[]
     */
    protected $functions;
    /**
     * @var File[]|array Map full qualified name to file object where it declared
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

    /**
     * Decorate phpDocumentor elements with custom element classes
     * @param Element|mixed $element Element to decorate
     * @return ElementInterface|mixed Decorated element or source element if there no mappings for this type
     */
    public function elementFactory($element)
    {
        $map = [
            PhpdocReflectionElements\Argument::class => Elements\ArgumentElement::class,
            PhpdocReflectionElements\Class_::class => Elements\ClassElement::class,
            PhpdocReflectionElements\Constant::class => Elements\ConstantElement::class,
            PhpdocReflectionElements\Function_::class => Elements\FunctionElement::class,
            PhpdocReflectionElements\Interface_::class => Elements\InterfaceElement::class,
            PhpdocReflectionElements\Method::class => Elements\MethodElement::class,
            PhpdocReflectionElements\Namespace_::class => Elements\NamespaceElement::class,
            PhpdocReflectionElements\Property::class => Elements\PropertyElement::class,
            PhpdocReflectionElements\Trait_::class => Elements\TraitElement::class,
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
     * @return NamespacesCollection
     */
    public function getNamespaces(): NamespacesCollection
    {
        if ($this->namespaces === null) {
            $this->namespaces = new NamespacesCollection(array_map(function ($prop) {
                return $this->elementFactory($prop);
            }, $this->proxyProject(__FUNCTION__, func_get_args())));
            $this->namespaces = $this->namespaces->sortBy(function (NamespaceElement $namespace) {
                return (string)$namespace->getFqsen();
            }, SORT_ASC, SORT_NATURAL);
        }

        return $this->namespaces;
    }

    /**
     * @param string $method
     * @return array
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
     * @return InterfaceElement[]
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
     * @return TraitElement[]
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
     * @return ConstantElement[]
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
     * @return FunctionElement[]
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
     * @return mixed|null
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
