<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\ServiceProviders;

use phpDocumentor\Reflection\DocBlock\Tags\Example;
use phpDocumentor\Reflection\DocBlockFactory as PhpDocumentorDocBlockFactory;
use spaceonfire\ApiDoc\Element\DocBlock\Factory\DocBlockFactory;
use spaceonfire\ApiDoc\Element\DocBlock\Factory\DocBlockFactoryInterface;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\ClassDocBlockResolver;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\CompositeDocBlockResolver;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\DefaultDocBlockResolver;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\DocBlockResolverInterface;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\MemoizedDocBlockResolver;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\MethodDocBlockResolver;
use spaceonfire\ApiDoc\Element\DocBlock\Resolver\PropertyDocBlockResolver;
use spaceonfire\Container\ServiceProvider\AbstractServiceProvider;

final class DocBlockResolverProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function provides(): array
    {
        return [
            DocBlockFactoryInterface::class,
            DocBlockFactory::class,
            DocBlockResolverInterface::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->getContainer()->add(DocBlockFactoryInterface::class, DocBlockFactory::class);
        $this->getContainer()->share(
            DocBlockFactory::class,
            $docBlockFactory = new DocBlockFactory(PhpDocumentorDocBlockFactory::createInstance([
                'example' => Example::class,
            ]))
        );

        $this->getContainer()->share(
            DocBlockResolverInterface::class,
            new MemoizedDocBlockResolver(new CompositeDocBlockResolver(
                new ClassDocBlockResolver($docBlockFactory),
                new MethodDocBlockResolver($docBlockFactory),
                new PropertyDocBlockResolver($docBlockFactory),
                new DefaultDocBlockResolver($docBlockFactory)
            ))
        );
    }
}
