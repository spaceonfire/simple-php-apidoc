<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Render;

use spaceonfire\Container\Exception\NotFoundException;
use Webmozart\Assert\Assert;

final class StaticListTemplateNameStrategy implements TemplateNameStrategyInterface
{
    /**
     * @var array<string,string>
     */
    private $templateMapping;

    /**
     * StaticListTemplateNameStrategy constructor.
     * @param array<string,string> $templateMapping
     */
    public function __construct(array $templateMapping)
    {
        Assert::allStringNotEmpty($templateMapping);
        Assert::allStringNotEmpty(array_keys($templateMapping));

        $this->templateMapping = $templateMapping;
    }

    /**
     * @inheritDoc
     */
    public function get($id): string
    {
        if (!$this->has($id)) {
            throw new NotFoundException(sprintf('No template found for element "%s"', $id));
        }

        return $this->templateMapping[$id];
    }

    /**
     * @inheritDoc
     */
    public function has($id): bool
    {
        return isset($this->templateMapping[$id]);
    }
}
