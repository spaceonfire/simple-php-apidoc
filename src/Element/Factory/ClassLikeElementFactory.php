<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Factory;

use phpDocumentor\Reflection\DocBlock\Tags\Method;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use phpDocumentor\Reflection\DocBlock\Tags\PropertyRead;
use phpDocumentor\Reflection\DocBlock\Tags\PropertyWrite;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionClassConstant;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use Roave\BetterReflection\Reflection\ReflectionProperty;
use spaceonfire\ApiDoc\Element\ClassElement;
use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\DocBlockResolverInterface;
use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\InterfaceElement;
use spaceonfire\ApiDoc\Element\Location\LocationFactory;
use spaceonfire\ApiDoc\Element\MethodElement;
use spaceonfire\ApiDoc\Element\PropertyElement;
use spaceonfire\ApiDoc\Element\TraitElement;
use spaceonfire\ApiDoc\Element\ValueObject\ClassMembersVisibilityFilter;
use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;
use spaceonfire\ApiDoc\Element\ValueObject\FunctionParameter;
use spaceonfire\ApiDoc\Element\ValueObject\FunctionReturn;
use spaceonfire\ApiDoc\Element\ValueObject\Visibility;
use spaceonfire\ApiDoc\Element\ValueObject\VisibilityFilter;
use spaceonfire\Type\Factory\TypeFactoryInterface;
use Webmozart\Assert\Assert;

final class ClassLikeElementFactory extends AbstractElementFactory
{
    /**
     * @var ClassMembersVisibilityFilter
     */
    private $membersVisibilityFilter;

    public function __construct(
        DocBlockResolverInterface $docBlockResolver,
        TypeFactoryInterface $typeFactory,
        LocationFactory $locationFactory,
        ?ClassMembersVisibilityFilter $membersVisibilityFilter = null
    ) {
        parent::__construct($docBlockResolver, $typeFactory, $locationFactory);

        $this->membersVisibilityFilter = $membersVisibilityFilter
            ?? new ClassMembersVisibilityFilter(new VisibilityFilter());
    }

    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return $reflection instanceof ReflectionClass;
    }

    /**
     * @param ReflectionClass $reflection
     * @return ClassElement|InterfaceElement|TraitElement
     */
    private function createElement(ReflectionClass $reflection): ElementInterface
    {
        if ($reflection->isInterface()) {
            return new InterfaceElement();
        }

        if ($reflection->isTrait()) {
            return new TraitElement();
        }

        return new ClassElement();
    }

    /**
     * @inheritDoc
     * @param ReflectionClass $reflection
     * @return ClassElement|InterfaceElement|TraitElement
     */
    protected function doMake(object $reflection): ElementInterface
    {
        $element = $this->createElement($reflection);

        $docBlock = $this->docBlockResolver->resolve($reflection);

        $element->name = new Fqsen($reflection->getName());
        $element->summary = $docBlock->getSummary();
        $element->description = $docBlock->getDescription();
        $element->deprecated = $this->getDeprecated($docBlock);
        $element->links = $element->links->merge($this->makeLinksFromDocBlock($docBlock));

        if ($element instanceof ClassElement) {
            $element->abstract = $reflection->isAbstract() || $docBlock->hasTag('abstract');
            $element->final = $reflection->isFinal() || $docBlock->hasTag('final');
        }

        if ($element instanceof ClassElement || $element instanceof InterfaceElement) {
            $element->constants = $element->constants->merge(
                array_map(
                    function (ReflectionClassConstant $reflection) {
                        return $this->parent->make($reflection);
                    },
                    array_filter(
                        $reflection->getReflectionConstants(),
                        function (ReflectionClassConstant $reflection) {
                            $filter = $this->membersVisibilityFilter->forConstants();

                            if ($reflection->isPrivate()) {
                                return $filter->hasPrivate();
                            }

                            if ($reflection->isProtected()) {
                                return $filter->hasProtected();
                            }

                            return $filter->hasPublic();
                        }
                    )
                )
            );
        }

        if ($element instanceof ClassElement || $element instanceof TraitElement) {
            $element->properties = $element->properties->merge(
                array_map(function (ReflectionProperty $reflection) {
                    return $this->parent->make($reflection);
                }, $reflection->getProperties($this->getReflectionPropertiesFilter()))
            );
        }

        $element->methods = $element->methods->merge(
            array_map(function (ReflectionMethod $reflection) {
                return $this->parent->make($reflection);
            }, $reflection->getMethods($this->getReflectionMethodsFilter()))
        );

        if ($element instanceof ClassElement || $element instanceof InterfaceElement) {
            $interfaces = array_map(function (ReflectionClass $reflection) {
                return $this->parent->make($reflection);
            }, $reflection->getInterfaces());

            if ($element instanceof ClassElement) {
                $element->interfaces = $element->interfaces->merge($interfaces);
            } else {
                $element->parents = $element->parents->merge($interfaces);
            }
        }

        if ($element instanceof ClassElement || $element instanceof TraitElement) {
            $traits = array_map(function (ReflectionClass $reflection) {
                return $this->parent->make($reflection);
            }, $reflection->getTraits());

            if ($element instanceof ClassElement) {
                $element->traits = $element->traits->merge($traits);
            } else {
                $element->parents = $element->parents->merge($traits);
            }
        }

        if ($element instanceof ClassElement && null !== $parentReflection = $reflection->getParentClass()) {
            $parent = $this->parent->make($parentReflection);

            Assert::isInstanceOf($parent, ClassElement::class);

            $element->parent = $parent;
        }

        $element->magicMethods = $element->magicMethods->merge(
            $this->createMagicMethods($element->name->getName(), $docBlock)
        );
        $element->magicProperties = $element->magicProperties->merge(
            $this->createMagicProperties($element->name->getName(), $docBlock)
        );

        if (null !== $reflection->getFileName()) {
            $element->location = $this->locationFactory->make(
                $reflection->getFileName(),
                $reflection->getStartLine(),
                $reflection->getStartColumn()
            );
            $element->examples = $element->examples->merge(
                $this->makeExamplesFromDocBlock($docBlock, $element->location)
            );
        }

        return $element;
    }

    private function getReflectionPropertiesFilter(): ?int
    {
        $output = 0;

        $filter = $this->membersVisibilityFilter->forProperties();

        if ($filter->hasPublic()) {
            $output |= \ReflectionProperty::IS_PUBLIC;
        }

        if ($filter->hasProtected()) {
            $output |= \ReflectionProperty::IS_PROTECTED;
        }

        if ($filter->hasPrivate()) {
            $output |= \ReflectionProperty::IS_PRIVATE;
        }

        return 0 === $output ? null : $output;
    }

    private function getReflectionMethodsFilter(): ?int
    {
        $output = 0;

        $filter = $this->membersVisibilityFilter->forProperties();

        if ($filter->hasPublic()) {
            $output |= \ReflectionMethod::IS_PUBLIC;
        }

        if ($filter->hasProtected()) {
            $output |= \ReflectionMethod::IS_PROTECTED;
        }

        if ($filter->hasPrivate()) {
            $output |= \ReflectionMethod::IS_PRIVATE;
        }

        return 0 === $output ? null : $output;
    }

    /**
     * @param string $className
     * @param DocBlock $docBlock
     * @return \Generator<MethodElement>|MethodElement[]
     */
    private function createMagicMethods(string $className, DocBlock $docBlock): iterable
    {
        /** @var Method $methodTag */
        foreach ($docBlock->getTagsByName('method') as $methodTag) {
            $element = new MethodElement();
            $element->name = new Fqsen($className . '::' . $methodTag->getMethodName());
            $element->summary = (string)$methodTag->getDescription();
            $element->description = '';
            $element->static = $methodTag->isStatic();
            $element->visibility = Visibility::public();
            $element->parameters = $element->parameters->merge(
                array_map(function (array $arg) use ($className): FunctionParameter {
                    return new FunctionParameter(
                        $arg['name'],
                        '',
                        $this->createTypeFromDocBlock($arg['type'], $className)
                    );
                }, $methodTag->getArguments())
            );
            $element->return = new FunctionReturn(
                '',
                $this->createTypeFromDocBlock($methodTag->getReturnType(), $className)
            );

            yield $element;
        }
    }

    /**
     * @param string $className
     * @param DocBlock $docBlock
     * @return \Generator<PropertyElement>|PropertyElement[]
     */
    private function createMagicProperties(string $className, DocBlock $docBlock): iterable
    {
        /** @var Property $tag */
        foreach ($docBlock->getTagsByName('property') as $tag) {
            yield $this->createMagicProperty($className, $tag);
        }
        /** @var PropertyRead $tag */
        foreach ($docBlock->getTagsByName('property-read') as $tag) {
            yield $this->createMagicProperty($className, $tag);
        }
        /** @var PropertyWrite $tag */
        foreach ($docBlock->getTagsByName('property-write') as $tag) {
            yield $this->createMagicProperty($className, $tag);
        }
    }

    /**
     * @param string $className
     * @param Property|PropertyRead|PropertyWrite $tag
     * @return PropertyElement
     */
    private function createMagicProperty(string $className, $tag): PropertyElement
    {
        $element = new PropertyElement();

        $element->name = new Fqsen($className . '::$' . $tag->getVariableName());
        $element->summary = (string)$tag->getDescription();
        $element->description = '';
        $element->static = false;
        $element->visibility = Visibility::public();
        $element->type = $this->createTypeFromDocBlock($tag->getType(), $className);

        return $element;
    }
}
