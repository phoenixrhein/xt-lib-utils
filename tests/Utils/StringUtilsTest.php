<?php

namespace Tests\Unit\De\Xovatec\Utils;

use De\Xovatec\Utils\StringUtils;
use PHPUnit\Framework\TestCase;

/**
 * Class StringUtilsTest.
 *
 * @author Bastian Hohmann <xt>
 * @copyright xovatec // www.xovatec.de
 *
 * @covers \De\Xovatec\Utils\StringUtils
 */
class StringUtilsTest extends TestCase
{

    public function testEndsWith(): void
    {
        $this->assertTrue(StringUtils::endsWith('hello', 'lo'));
        $this->assertFalse(StringUtils::endsWith('hello', 'lof'));

        $this->assertTrue(StringUtils::endsWith('hello', ['bla', 'lo']));
        $this->assertFalse(StringUtils::endsWith('hello', ['bla', 'lof']));
    }

    public function testAppendEndsWith(): void
    {
        $this->assertEquals('hello', StringUtils::appendEndsWith('hello', 'lo'));
        $this->assertEquals('hellolof', StringUtils::appendEndsWith('hello', 'lof'));
    }

    public function testStartWith(): void
    {
        $this->assertTrue(StringUtils::startWith('hello', 'he'));
        $this->assertFalse(StringUtils::startWith('hello', 'He'));
    }

}
