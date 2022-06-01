<?php /** @noinspection PhpHierarchyChecksInspection */

declare(strict_types=1);

namespace spaceonfire\ApiDoc\_Fixtures\Php72;

/**
 * Child class summary
 *
 * Child class description
 * @inheritDoc
 *
 * @author Child Author
 * @copyright child copyright
 * @package child package
 * @subpackage child subpackage
 * @version 3.0 version description
 * @property-read $propertyC redeclared by child
 * @method methodC() redeclared by child
 */
class ExampleChildClass extends ExampleClass
{
    /**
     * Property summary overridden in child class
     *
     * @inheritDoc
     * Child Description
     *
     * @var int child description
     * @author Child Author
     * @copyright child copyright
     * @version 3.0 version description
     */
    public $propertyFromClass;
    /**
     * Property summary overridden in child class
     * @inheritDoc
     * @author Child Author
     * @copyright child copyright
     * @version 3.0 version description
     */
    public $propertyFromTrait;
    /**
     * @inheritDoc
     */
    public $propertyFromChildClass;

    /**
     * Child Summary
     *
     * Child before inheritDoc
     *
     * {@inheritDoc}
     *
     * Child after inheritDoc
     *
     * @param string $name overridden in child argument description
     * @param mixed|null $childArgument additional argument from child class
     * @throws \InvalidArgumentException child throws invalid arguments
     * @throws \UnexpectedValueException throws unexpected value
     * @author Child Author
     * @copyright child copyright
     * @version 3.0 version description
     */
    public function method(string $name, $parentArgument = null, $childArgument = null): string
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function noParent(): void
    {
    }
}
