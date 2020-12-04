<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\_Fixtures\Php72;

/**
 * Interface summary
 *
 * Interface description
 *
 * @author Interface Author
 * @copyright interface copyright
 * @package package
 * @subpackage subpackage
 * @version 1.0
 *
 * @property int|string $propertyA declared by interface
 * @property $propertyB declared by interface
 * @property $propertyC declared by interface
 *
 * @method methodA() declared by interface
 * @method methodB() declared by interface
 * @method methodC() declared by interface
 */
interface ExampleInterface
{
    /**
     * Constant summary
     *
     * Constant description
     *
     * @var string Public Constant
     */
    public const PUBLIC_CONST = 'public_const';
    /**
     * @var string Protected Constant
     * @see ExampleInterface::PUBLIC_CONST
     * @link https://google.com
     */
    protected const PROTECTED_CONST = 'protected_const';
    /**
     * @var string Private Constant
     * @deprecated
     */
    private const PRIVATE_CONST = 'private_const';
    /**
     * @var string Constant without visibility modifier
     */
    const CONST = ['const', self::PRIVATE_CONST];

    /**
     * Default summary.
     *
     * Default Description
     *
     * @param string $name argument description
     * @return string returned value description
     * @author Interface Author
     * @copyright interface copyright
     * @version 1.0
     */
    public function method(string $name): string;
}
