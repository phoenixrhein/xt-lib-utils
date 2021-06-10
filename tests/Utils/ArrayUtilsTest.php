<?php

namespace Tests\Unit\De\Xovatec\Utils;

use De\Xovatec\Utils\ArrayUtils;
use PHPUnit\Framework\TestCase;

/**
 * Class ArrayUtilsTest.
 *
 * @author Bastian Hohmann <xt>
 * @copyright xovatec // www.xovatec.de
 *
 * @covers \De\Xovatec\Utils\ArrayUtils
 */
class ArrayUtilsTest extends TestCase
{

    public function testImplode(): void
    {
        $array = [
            'Hallo',
            '',
            'Welt'
        ];
        $string = ArrayUtils::implode(',', $array);

        $expectedString = "Hallo,Welt";
        $this->assertEquals($expectedString, $string);
    }

    public function testIsNumericKeysSuccess(): void
    {
        $array = [
            '1' => 'eins',
            '3' => 'drei',
            4 => 'vier'
        ];
        $result = ArrayUtils::isNumericKeys($array);
        $this->assertTrue($result);
    }

    public function testIsNumericKeysFail(): void
    {
        $array = [
            '1' => 'eins',
            '3' => 'drei',
            4 => 'vier',
            'zeichen' => 'keine Nummer'
        ];
        $result = ArrayUtils::isNumericKeys($array);
        $this->assertEquals(false, $result);
    }

    public function testRemoveEmpty(): void
    {
        $arrayWithEmpty = [
            'Hallo',
            '',
            'Welt'
        ];

        $arrayWithoutEmpty = [
            'Hallo',
            'Welt'
        ];

        $cleanedArray = ArrayUtils::removeEmpty($arrayWithEmpty);

        $this->assertEquals($arrayWithoutEmpty, $cleanedArray);
    }

    public function testIsRecursiveSuccess(): void
    {
        $array = [
            [
                "Recursive"
            ]
        ];

        $this->assertTrue(ArrayUtils::isRecursive($array));
    }

    public function testIsRecursive(): void
    {
        $array = [
            "No Recursive"
        ];

        $this->assertEquals(false, ArrayUtils::isRecursive($array));
    }

}
