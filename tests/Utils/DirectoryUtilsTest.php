<?php

namespace Tests\Unit\De\Xovatec\Utils;

use De\Xovatec\Utils\DirectoryUtils;
use LogHelper;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use UnexpectedValueException;

/**
 * Class DirectoryUtilsTest.
 *
 * @author Bastian Hohmann <xt>
 * @copyright xovatec // www.xovatec.de
 *
 * @covers \De\Xovatec\Utils\DirectoryUtils
 */
class DirectoryUtilsTest extends TestCase
{

    /**
     * @var DirectoryUtils
     */
    protected $directoryUtils;

    /**
     * @var string
     */
    protected $path;

    public static function setUpBeforeClass(): void
    {
        LogHelper::getLogger()->debug("Start test class " . DirectoryUtilsTest::class);
    }
    
    public static function tearDownAfterClass (): void
    {
        LogHelper::getLogger()->debug("Finish test class " . __CLASS__);
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();
        LogHelper::getLogger()->debug("Test method");
        $this->path = dirname(__FILE__);
        $this->directoryUtils = new DirectoryUtils($this->path);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->directoryUtils);
        unset($this->path);
    }

    /**
     * @expectedException UnexpectedValueException
     */
    public function testConstruct1()
    {
        //FYI: Annotation are deprecated
        $helper = new DirectoryUtils('isNoDir');
        
        $this->getMockBuilder()->se
    }

    public function testConstruct2()
    {
        $this->expectException(UnexpectedValueException::class);
        $helper = new DirectoryUtils('isNoDir');
    }

    public function testReadFiles(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testGetPath(): void
    {
        $expected = $this->path;
        $property = (new ReflectionClass(DirectoryUtils::class))
                ->getProperty('path');
        $property->setAccessible(true);
        $property->setValue($this->directoryUtils, $expected);
        $this->assertSame($expected, $this->directoryUtils->getPath());
    }

    public function testGetName(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testGetSubDirectories(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

    public function testExistsFile(): void
    {
        /** @todo This test is incomplete. */
        $this->markTestIncomplete();
    }

}
