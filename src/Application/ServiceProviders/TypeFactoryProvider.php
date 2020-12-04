<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\ServiceProviders;

use Roave\BetterReflection\Reflector\ClassReflector;
use spaceonfire\ApiDoc\Element\Type\Factory\BetterReflectionInstanceOfTypeFactory;
use spaceonfire\ApiDoc\Element\Type\Factory\BetterReflectionParentFactory;
use spaceonfire\Container\ServiceProvider\AbstractServiceProvider;
use spaceonfire\Type\Factory\CompositeTypeFactory;
use spaceonfire\Type\Factory\InstanceOfTypeFactory;
use spaceonfire\Type\Factory\TypeFactoryInterface;

final class TypeFactoryProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function provides(): array
    {
        return [
            TypeFactoryInterface::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->getContainer()->share(TypeFactoryInterface::class, function (ClassReflector $classReflector) {
            $factories = [];

            foreach (CompositeTypeFactory::makeDefaultFactories() as $factory) {
                if ($factory instanceof InstanceOfTypeFactory) {
                    $factories[] = new BetterReflectionInstanceOfTypeFactory($classReflector);
                    $factories[] = new BetterReflectionParentFactory($classReflector);
                    continue;
                }

                $factories[] = $factory;
            }

            return new CompositeTypeFactory(...$factories);
        });
    }
}
