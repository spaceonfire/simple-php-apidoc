<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\_Fixtures\Php72;

/**
 * AbstractClass summary
 * @package spaceonfire\ApiDoc\_Fixtures\Php72
 * @example ConcreteClass.php Implementation example
 * @deprecated
 */
abstract class AbstractClass implements DummyInterface
{
    /**
     * @var string Public Constant
     */
    public const PUBLIC_CONST = 'public_const';
    /**
     * @var string Protected Constant
     */
    protected const PROTECTED_CONST = 'protected_const';
    /**
     * @var string Private Constant
     */
    private const PRIVATE_CONST = 'private_const';
    /**
     * @var string Constant without visibility modifier
     */
    const CONST = 'const';

    /**
     * @var string|null
     */
    public $publicProperty;
    /**
     * @var int
     */
    protected $protectedProperty;
    /**
     * @var bool
     */
    private $privateProperty;

    /**
     * SimpleClass constructor.
     * @param int $protectedProperty argument description
     * @param bool $privateProperty
     * @throws \InvalidArgumentException throw description
     */
    public function __construct(int $protectedProperty, bool $privateProperty = true)
    {
        $this->protectedProperty = $protectedProperty;
        $this->privateProperty = $privateProperty;
    }

    /**
     * Says hello to somebody
     * @param string $name argument description
     * @return string returned value description
     * @throws \InvalidArgumentException throw description
     * @deprecated Deprecation reason.
     */
    final public function sayHello(string $name): string
    {
        return 'Hello, ' . $name;
    }

    /**
     * @link https://www.onfire.space/ SpaceOnfire Homepage
     * @see https://github.com/spaceonfire SpaceOnfire GitHub organization
     * @see AbstractClass::abstractMethod() see method
     * @see AbstractClass::$privateProperty see property
     * @see ExampleChildClass see class
     * @see ExampleChildClass::method() see other class method
     * @example example.php Full example file
     */
    public static function staticMethod()
    {
    }

    /**
     * @example ConcreteClass.php 11 4 Implementation example
     * @example https://www.onfire.space/ SpaceOnfire Homepage
     */
    abstract public function abstractMethod(): int;
}
