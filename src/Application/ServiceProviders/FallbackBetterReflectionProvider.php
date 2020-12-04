<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\ServiceProviders;

use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflector\ClassReflector;
use spaceonfire\Container\ServiceProvider\AbstractServiceProvider;

final class FallbackBetterReflectionProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function provides(): array
    {
        return [
            ClassReflector::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $reflection = $this->getContainer()->has(BetterReflection::class)
            ? $this->getContainer()->get(BetterReflection::class)
            : new BetterReflection();

        $this->getContainer()->share(ClassReflector::class, $reflection->classReflector());
    }
}
