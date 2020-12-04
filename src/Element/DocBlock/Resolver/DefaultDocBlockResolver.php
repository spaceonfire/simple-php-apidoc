<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\DocBlock\Resolver;

final class DefaultDocBlockResolver extends AbstractDocBlockResolver
{
    /**
     * @inheritDoc
     */
    public function supports(object $reflection): bool
    {
        return method_exists($reflection, 'getDocComment');
    }
}
