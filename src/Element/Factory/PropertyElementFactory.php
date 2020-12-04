<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Factory;

use Roave\BetterReflection\Reflection\ReflectionProperty;
use spaceonfire\ApiDoc\Element\ElementInterface;
use spaceonfire\ApiDoc\Element\PropertyElement;
use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;
use spaceonfire\ApiDoc\Element\ValueObject\Value;
use spaceonfire\ApiDoc\Element\ValueObject\Visibility;

final class PropertyElementFactory extends AbstractElementFactory
{
    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return $reflection instanceof ReflectionProperty;
    }

    /**
     * @inheritDoc
     * @param ReflectionProperty $reflection
     * @return PropertyElement
     */
    protected function doMake(object $reflection): ElementInterface
    {
        $element = new PropertyElement();

        $docBlock = $this->docBlockResolver->resolve($reflection);

        $element->name = new Fqsen($reflection->getDeclaringClass()->getName() . '::$' . $reflection->getName());
        $element->summary = $docBlock->getSummary();
        $element->description = $docBlock->getDescription();
        $element->static = $reflection->isStatic();
        $element->deprecated = $this->getDeprecated($docBlock);
        $element->links = $element->links->merge($this->makeLinksFromDocBlock($docBlock));

        if ($reflection->isPrivate()) {
            $element->visibility = Visibility::private();
        } elseif ($reflection->isProtected()) {
            $element->visibility = Visibility::protected();
        } else {
            $element->visibility = Visibility::public();
        }

        $element->type = $this->typeResolver->resolve($reflection, $docBlock);

        if (null !== $defaultValue = $reflection->getDefaultValue()) {
            $element->defaultValue = new Value($defaultValue);
        }

        if (null !== $reflection->getDeclaringClass()->getFileName()) {
            $element->location = $this->locationFactory->make(
                $reflection->getDeclaringClass()->getFileName(),
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
