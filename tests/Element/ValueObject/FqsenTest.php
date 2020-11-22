<?php

declare(strict_types=1);

namespace spaceonfire\ApiDoc\Element\ValueObject;

use PHPUnit\Framework\TestCase;

class FqsenTest extends TestCase
{
    /**
     * @dataProvider dataProvider()
     * @param string $fqsen
     * @param string $name
     * @param string $shortName
     * @param string $namespace
     */
    public function test(string $fqsen, string $name, string $shortName, string $namespace): void
    {
        $object = new Fqsen($fqsen);

        self::assertSame($name, $object->getName());
        self::assertSame($shortName, $object->getShortName());
        self::assertSame($namespace, $object->getNamespace());
    }

    public function dataProvider(): array
    {
        return [
            [
                'spaceonfire\ApiDoc\ValueObject',
                'spaceonfire\ApiDoc\ValueObject',
                'ValueObject',
                'spaceonfire\ApiDoc',
            ],
            [
                'spaceonfire\ApiDoc\ValueObject::method()',
                'spaceonfire\ApiDoc\ValueObject::method',
                'ValueObject::method',
                'spaceonfire\ApiDoc',
            ],
            [
                'Exception',
                'Exception',
                'Exception',
                '',
            ],
        ];
    }
}
