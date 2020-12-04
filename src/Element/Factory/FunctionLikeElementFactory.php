<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Factory;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Roave\BetterReflection\Reflection\ReflectionFunctionAbstract;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use Roave\BetterReflection\Reflection\ReflectionParameter;
use spaceonfire\ApiDoc\Element\DocBlock\DocBlock;
use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\FunctionElement;
use spaceonfire\ApiDoc\Element\MethodElement;
use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;
use spaceonfire\ApiDoc\Element\ValueObject\FunctionParameter;
use spaceonfire\ApiDoc\Element\ValueObject\FunctionReturn;
use spaceonfire\ApiDoc\Element\ValueObject\FunctionThrows;
use spaceonfire\ApiDoc\Element\ValueObject\Value;
use spaceonfire\ApiDoc\Element\ValueObject\Visibility;
use spaceonfire\Collection\Collection;

final class FunctionLikeElementFactory extends AbstractElementFactory
{
    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return $reflection instanceof ReflectionFunctionAbstract;
    }

    /**
     * @param ReflectionFunctionAbstract $reflection
     * @return MethodElement|FunctionElement
     */
    private function createElement(ReflectionFunctionAbstract $reflection): ElementInterface
    {
        if ($reflection instanceof ReflectionMethod) {
            return new MethodElement();
        }

        return new FunctionElement();
    }

    /**
     * @inheritDoc
     * @param ReflectionFunctionAbstract $reflection
     * @return MethodElement|FunctionElement
     */
    protected function doMake(object $reflection): ElementInterface
    {
        $element = $this->createElement($reflection);

        $docBlock = $this->docBlockResolver->resolve($reflection);

        if ($reflection instanceof ReflectionMethod) {
            $element->name = new Fqsen($reflection->getDeclaringClass()->getName() . '::' . $reflection->getName());
        } else {
            $element->name = new Fqsen($reflection->getName());
        }

        $element->summary = $docBlock->getSummary();
        $element->description = $docBlock->getDescription();
        $element->deprecated = $this->getDeprecated($docBlock);
        $element->links = $element->links->merge($this->makeLinksFromDocBlock($docBlock));

        if ($reflection instanceof ReflectionMethod) {
            $element->static = $reflection->isStatic();
            $element->abstract = $reflection->isAbstract();
            $element->final = $reflection->isFinal();

            if ($reflection->isPrivate()) {
                $element->visibility = Visibility::private();
            } elseif ($reflection->isProtected()) {
                $element->visibility = Visibility::protected();
            } else {
                $element->visibility = Visibility::public();
            }
        }

        $element->parameters = $element->parameters->merge($this->createParameters($reflection, $docBlock));
        $element->return = $this->createReturn($reflection, $docBlock);
        $element->throws = $element->throws->merge($this->createThrows($docBlock));

        if ($reflection instanceof ReflectionMethod && null !== $reflection->getDeclaringClass()->getFileName()) {
            $element->location = $this->locationFactory->make(
                $reflection->getDeclaringClass()->getFileName(),
                $reflection->getStartLine(),
                $reflection->getStartColumn()
            );
        } elseif (null !== $reflection->getFileName()) {
            $element->location = $this->locationFactory->make(
                $reflection->getFileName(),
                $reflection->getStartLine(),
                $reflection->getStartColumn()
            );
        }

        if (null !== $element->location) {
            $element->examples = $element->examples->merge(
                $this->makeExamplesFromDocBlock($docBlock, $element->location)
            );
        }

        return $element;
    }

    /**
     * @param ReflectionFunctionAbstract $reflection
     * @param DocBlock $docBlock
     * @return FunctionParameter[]
     */
    private function createParameters(ReflectionFunctionAbstract $reflection, DocBlock $docBlock): iterable
    {
        $paramTags = (new Collection($docBlock->getTagsByName('param')))
            ->indexBy(function (Param $param) {
                return $param->getVariableName();
            });

        /** @var ReflectionParameter $parameter */
        foreach ($reflection->getParameters() as $parameter) {
            $defaultValue = $parameter->isDefaultValueAvailable()
                ? new Value($parameter->getDefaultValue())
                : null;

            $paramTag = $paramTags[$parameter->getName()] ?? null;

            yield new FunctionParameter(
                $parameter->getName(),
                $paramTag ? (string)$paramTag->getDescription() : '',
                $this->typeResolver->resolve($parameter, $docBlock),
                $parameter->isVariadic(),
                $parameter->isPassedByReference(),
                $defaultValue
            );
        }
    }

    private function createReturn(ReflectionFunctionAbstract $reflection, DocBlock $docBlock): ?FunctionReturn
    {
        $returnType = $this->typeResolver->resolve($reflection, $docBlock);
        /** @var Return_|null $returnTag */
        $returnTag = $docBlock->getFirstTagByName('return');

        if (null === $returnType && null === $returnTag) {
            return null;
        }

        return new FunctionReturn($returnTag ? (string)$returnTag->getDescription() : '', $returnType);
    }

    /**
     * @param DocBlock $docBlock
     * @return FunctionThrows[]
     */
    private function createThrows(DocBlock $docBlock): iterable
    {
        /** @var Throws $tag */
        foreach ($docBlock->getTagsByName('throws') as $tag) {
            yield new FunctionThrows((string)$tag->getDescription(), $this->createTypeFromDocBlock($tag->getType()));
        }
    }
}
