<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Generator;

final class File
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $content;

    /**
     * File constructor.
     * @param string $name
     * @param string $content
     */
    public function __construct(string $name, string $content)
    {
        $this->name = $name;
        $this->content = $content;
    }

    /**
     * Getter for `name` property.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Getter for `content` property.
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
