<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Generator;

use spaceonfire\ApiDoc\Project\Project;

interface GeneratorInterface
{
    /**
     * Generates apiDoc for given project
     * @param Project $project
     * @return File[]
     */
    public function generate(Project $project): iterable;
}
