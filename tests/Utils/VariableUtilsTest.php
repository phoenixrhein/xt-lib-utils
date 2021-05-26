<?php

namespace Tests\Unit\De\Xovatec\Utils;

use De\Xovatec\Utils\VariableUtils;
use PHPUnit\Framework\TestCase;

/**
 * Class VariableUtilsTest.
 *
 * @author bhohmann
 * @copyright hobutech // www.hobutech.de
 *
 * @covers \De\Xovatec\Utils\VariableUtils
 */
class VariableUtilsTest extends TestCase
{
    /**
     * @var VariableUtils
     */
    protected $variableUtils;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->variableUtils = new VariableUtils();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->variableUtils);
    }

    public function testToogle(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }
}
