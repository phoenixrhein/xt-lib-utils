<?php

namespace Tests\Unit\De\Xovatec\Utils;

use De\Xovatec\Utils\VariableUtils;
use PHPUnit\Framework\TestCase;

/**
 * Class VariableUtilsTest.
 *
 * @author Bastian Hohmann <xt>
 * @copyright xovatec // www.xovatec.de
 *
 * @covers \De\Xovatec\Utils\VariableUtils
 */
class VariableUtilsTest extends TestCase
{

    public function testToggle(): void
    {
        $var1 = 'bla';
        $var2 = 'blub';
        VariableUtils::toggle($var1, $var2);
        $this->assertEquals('bla', $var2);
        $this->assertEquals('blub', $var1);
    }

}
