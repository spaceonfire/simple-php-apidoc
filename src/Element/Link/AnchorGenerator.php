<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\Link;

use Jawira\CaseConverter\Convert;
use spaceonfire\ApiDoc\Element\ValueObject\Fqsen;

final class AnchorGenerator
{
    public function __invoke(Fqsen $fqsen): string
    {
        /** @var string[] $parts */
        $parts = preg_split('/[\\\|:]/', $fqsen->getName());
        $parts = array_filter(array_map('trim', $parts));
        return (new Convert(implode('_', $parts)))->toSnake();
    }
}
