<?php

namespace Tests\Unit\De\Xovatec\Utils;

use De\Xovatec\Utils\StringUtils;
use PHPUnit\Framework\TestCase;

/**
 * Class StringUtilsTest.
 *
 * @author bhohmann
 * @copyright hobutech // www.hobutech.de
 *
 * @covers \De\Xovatec\Utils\StringUtils
 */
class StringUtilsTest extends TestCase
{
    /**
     * @var StringUtils
     */
    protected $stringUtils;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->stringUtils = new StringUtils();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->stringUtils);
    }

    public function testEndsWith(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testAppendEndsWith(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testStartWith(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }
}
