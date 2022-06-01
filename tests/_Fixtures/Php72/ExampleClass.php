<?php /** @noinspection PhpHierarchyChecksInspection */

declare(strict_types=1);

namespace spaceonfire\ApiDoc\_Fixtures\Php72;

/**
 * Parent class summary
 *
 * @inheritDoc
 * Parent class description
 *
 * @author Parent Author
 * @copyright parent copyright
 * @package parent package
 * @subpackage parent subpackage
 * @version 2.0
 *
 * @property-read $propertyB redeclared by parent
 * @property-write $propertyC redeclared by parent
 *
 * @method methodB() redeclared by parent
 * @method methodC() redeclared by parent
 */
class ExampleClass implements ExampleChildInterface
{
    use ExampleChildTrait;

    /**
     * This property declared in parent class
     *
     * Parent Description
     *
     * @var int|string description
     * @author Parent Author
     * @copyright parent copyright
     * @version 2.0
     */
    public $propertyFromClass;
    /**
     * @inheritDoc
     */
    public $propertyFromTrait;

    /**
     * Parent summary
     * @inheritDoc
     * Parent after inheritDoc
     * @param mixed|null $parentArgument parent argument description
     * @throws \InvalidArgumentException throws invalid arguments
     * @author Parent Author
     * @copyright parent copyright
     * @version 2.0
     */
    public function method(string $name, $parentArgument = null): string
    {
        return '';
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method  methodA()
        // TODO: Implement @method  methodB()
        // TODO: Implement @method  methodC()
    }
}
