<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Generator;

interface PersisterInterface
{
    /**
     * @param File $file
     */
    public function persist(File $file): void;
}
