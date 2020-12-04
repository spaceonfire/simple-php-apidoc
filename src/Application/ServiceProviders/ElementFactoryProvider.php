<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\ServiceProviders;

use spaceonfire\ApiDoc\Element\Factory\ClassLikeElementFactory;
use spaceonfire\ApiDoc\Element\Factory\CompositeElementFactory;
use spaceonfire\ApiDoc\Element\Factory\ConstantElementFactory;
use spaceonfire\ApiDoc\Element\Factory\ElementFactoryInterface;
use spaceonfire\ApiDoc\Element\Factory\FunctionLikeElementFactory;
use spaceonfire\ApiDoc\Element\Factory\MemoizedElementFactory;
use spaceonfire\ApiDoc\Element\Factory\PropertyElementFactory;
use spaceonfire\Container\ServiceProvider\AbstractServiceProvider;

final class ElementFactoryProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function provides(): array
    {
        return [
            ElementFactoryInterface::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->getContainer()->share(
            ElementFactoryInterface::class,
            function () {
                return new MemoizedElementFactory(new CompositeElementFactory(
                    $this->getContainer()->make(ClassLikeElementFactory::class),
                    $this->getContainer()->make(ConstantElementFactory::class),
                    $this->getContainer()->make(FunctionLikeElementFactory::class),
                    $this->getContainer()->make(PropertyElementFactory::class)
                ));
            }
        );
    }
}
