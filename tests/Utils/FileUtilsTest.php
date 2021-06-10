<?php

namespace Tests\Unit\De\Xovatec\Utils;

use De\Xovatec\Utils\FileUtils;
use PHPUnit\Framework\TestCase;

/**
 * Class FileUtilsTest.
 *
 * @author Bastian Hohmann <xt>
 * @copyright xovatec // www.xovatec.de
 *
 * @covers \De\Xovatec\Utils\FileUtils
 */
class FileUtilsTest extends TestCase
{

    public function testClearName(): void
    {
        $expected = "Das-Uebernatuerliche-ss";
        $clearname = FileUtils::clearName("Das Übernatürliche @ß");
        $this->assertEquals($expected, $clearname);

        $expected = "das-uebernatuerliche-ss";
        $clearname = FileUtils::clearName("Das Übernatürliche @ß", true);
        $this->assertEquals($expected, $clearname);

        $expected = "das#uebernatuerliche#ss";
        $clearname = FileUtils::clearName("Das^  Übernatürliche \\/\ß@", true, '#');
        $this->assertEquals($expected, $clearname);
    }

    public function testGetInfo(): void
    {
        $filepathInfo = FileUtils::getFilePathInfo('/root\etc/my-file.php');
        $this->assertEquals(DIRECTORY_SEPARATOR . 'root' . DIRECTORY_SEPARATOR . 'etc', $filepathInfo->getDirname());
        $this->assertEquals('my-file.php', $filepathInfo->getBasename());
        $this->assertEquals('my-file', $filepathInfo->getFilename());
        $this->assertEquals('php', $filepathInfo->getExtension());

        $filepathInfo = FileUtils::getFilePathInfo('my-file.php');
        $this->assertEquals('.', $filepathInfo->getDirname());
        $this->assertEquals('my-file.php', $filepathInfo->getBasename());
        $this->assertEquals('my-file', $filepathInfo->getFilename());
        $this->assertEquals('php', $filepathInfo->getExtension());
    }

}
