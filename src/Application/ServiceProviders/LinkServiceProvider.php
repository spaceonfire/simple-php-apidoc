<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\ServiceProviders;

use spaceonfire\ApiDoc\Element\Link\CompositeLinkResolver;
use spaceonfire\ApiDoc\Element\Link\ExternalLinkResolver;
use spaceonfire\ApiDoc\Element\Link\FqsenLinkResolver;
use spaceonfire\ApiDoc\Element\Link\LinkResolverInterface;
use spaceonfire\Container\ServiceProvider\AbstractServiceProvider;

final class LinkServiceProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function provides(): array
    {
        return [
            LinkResolverInterface::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->getContainer()->share(LinkResolverInterface::class, function () {
            return new CompositeLinkResolver(
                new ExternalLinkResolver(),
                $this->getContainer()->make(FqsenLinkResolver::class)
            );
        });
    }
}
