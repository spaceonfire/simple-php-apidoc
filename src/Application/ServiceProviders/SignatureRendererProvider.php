<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Application\ServiceProviders;

use spaceonfire\ApiDoc\Element\Signature\CompositeSignatureRenderer;
use spaceonfire\ApiDoc\Element\Signature\ConstantSignatureRenderer;
use spaceonfire\ApiDoc\Element\Signature\FunctionLikeElementSignatureRenderer;
use spaceonfire\ApiDoc\Element\Signature\PropertySignatureRenderer;
use spaceonfire\ApiDoc\Element\Signature\SignatureRendererInterface;
use spaceonfire\Container\ServiceProvider\AbstractServiceProvider;

final class SignatureRendererProvider extends AbstractServiceProvider
{
    /**
     * @inheritDoc
     */
    public function provides(): array
    {
        return [
            SignatureRendererInterface::class,
        ];
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        $this->getContainer()->share(
            SignatureRendererInterface::class,
            new CompositeSignatureRenderer(...$this->makeRenderers())
        );
    }

    /**
     * @return \Generator<SignatureRendererInterface>|SignatureRendererInterface[]
     */
    private function makeRenderers(): \Generator
    {
        yield new ConstantSignatureRenderer();
        yield new FunctionLikeElementSignatureRenderer();
        yield new PropertySignatureRenderer();
    }
}
