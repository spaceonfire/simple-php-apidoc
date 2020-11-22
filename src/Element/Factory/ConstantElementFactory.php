<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Factory;

use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Roave\BetterReflection\Reflection\ReflectionClassConstant;
use Roave\BetterReflection\Reflection\ReflectionConstant;
use spaceonfire\ApiDoc\Element\ConstantElement;
use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;
use spaceonfire\ApiDoc\Element\ValueObject\Value;
use spaceonfire\ApiDoc\Element\ValueObject\Visibility;

final class ConstantElementFactory extends AbstractElementFactory
{
    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return $reflection instanceof ReflectionClassConstant || $reflection instanceof ReflectionConstant;
    }

    /**
     * @inheritDoc
     * @param ReflectionClassConstant|ReflectionConstant $reflection
     * @return ConstantElement
     */
    protected function doMake(object $reflection): ElementInterface
    {
        $element = new ConstantElement();

        $docBlock = $this->docBlockResolver->resolve($reflection);

        if ($reflection instanceof ReflectionClassConstant) {
            $element->name = new Fqsen($reflection->getDeclaringClass()->getName() . '::' . $reflection->getName());
        } else {
            $element->name = new Fqsen($reflection->getName());
        }
        $element->summary = $docBlock->getSummary();
        $element->description = $docBlock->getDescription();
        $element->value = new Value($reflection->getValue());
        $element->deprecated = $this->getDeprecated($docBlock);
        $element->links = $element->links->merge($this->makeLinksFromDocBlock($docBlock));

        /** @var Var_ $varTag */
        $varTag = $docBlock->getFirstTagByName('var');
        if ('' === $element->summary && null !== $varTag) {
            $element->summary = trim((string)($varTag->getDescription() ?? ''));
        }

        if ($reflection instanceof ReflectionClassConstant) {
            if ($reflection->isPrivate()) {
                $element->visibility = Visibility::private();
            } elseif ($reflection->isProtected()) {
                $element->visibility = Visibility::protected();
            } else {
                $element->visibility = Visibility::public();
            }
        } else {
            $element->visibility = Visibility::public();
        }

        $filename = $reflection instanceof ReflectionClassConstant
            ? $reflection->getDeclaringClass()->getFileName()
            : $reflection->getFileName();

        if (null !== $filename) {
            $element->location = $this->locationFactory->make(
                $filename,
                $reflection->getStartLine(),
                $reflection->getStartColumn()
            );
            $element->examples = $element->examples->merge(
                $this->makeExamplesFromDocBlock($docBlock, $element->location)
            );
        }

        return $element;
    }
}
