<?php

declare(strict_types=1);

namespace spaceonfire\SimplePhpApiDoc\Elements\Collections;

use RuntimeException;
use spaceonfire\Collection\BaseCollection;

/**
 * Class TypedCollection
 * @package spaceonfire\SimplePhpApiDoc\Elements\Collections
 * TODO: move to spaceonfire/collection
 */
class TypedCollection extends BaseCollection
{
    /**
     * @var string
     */
    protected $type;

    /**
     * TypedCollection constructor.
     * @param array $items
     * @param string $type Full qualified name of type
     */
    public function __construct($items = [], string $type = \stdClass::class)
    {
        $this->type = $type;
        parent::__construct($items);
    }

    /** {@inheritDoc} */
    protected function getItems($items): array
    {
        $result = parent::getItems($items);
        foreach ($result as $item) {
            if (!($item instanceof $this->type)) {
                throw new RuntimeException(static::class . ' accept only instances of ' . $this->type);
            }
        }
        return $result;
    }

    /**
     * TODO: move to BaseCollection
     * @param callable $callback
     * @return mixed|null
     */
    public function find(callable $callback)
    {
        foreach ($this->all() as $key => $item) {
            if ($callback($item, $key) === true) {
                return $item;
            }
        }

        return null;
    }
}
