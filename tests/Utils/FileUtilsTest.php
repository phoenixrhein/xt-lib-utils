<?php

namespace Tests\Unit\De\Xovatec\Utils;

use De\Xovatec\Utils\FileUtils;
use PHPUnit\Framework\TestCase;

/**
 * Class FileUtilsTest.
 *
 * @author bhohmann
 * @copyright hobutech // www.hobutech.de
 *
 * @covers \De\Xovatec\Utils\FileUtils
 */
class FileUtilsTest extends TestCase
{
    /**
     * @var FileUtils
     */
    protected $fileUtils;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->fileUtils = new FileUtils();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->fileUtils);
    }

    public function testClearName(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testGetInfo(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testGetFilename(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testGetDirectory(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }
}
