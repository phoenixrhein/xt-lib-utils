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
    /**
     * @var ArrayUtils
     */
    protected $arrayUtils;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->arrayUtils = new ArrayUtils();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->arrayUtils);
    }

    public function testImplode(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testIsNumericKeys(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testRemoveEmpty(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testIsRecursive(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }
}
