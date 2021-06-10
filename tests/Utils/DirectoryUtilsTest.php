<?php

namespace Tests\Unit\De\Xovatec\Utils;

use De\Xovatec\Utils\DirectoryUtils;
use phpmock\Mock;
use phpmock\MockBuilder;
use PHPUnit\Framework\TestCase;
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

    /**
     * 
     * @var Mock
     */
    private $isDirMock;

    /**
     * 
     * @var Mock
     */
    private $openDirMock;

    /**
     * 
     * @var Mock
     */
    private $readDirMock;

    /**
     * 
     * @var Mock
     */
    private $closeDirMock;

    /**
     * 
     * @var Mock
     */
    private $fileExistMock;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $filesystem = [
            'mainDir' => [
                '.',
                '..',
                'subDir' => [
                ],
                'file1',
                'file2'
            ]
        ];
        $index = 0;

        $builder = new MockBuilder();
        $builder->setNamespace("\\De\\Xovatec\\Utils")
                ->setName("is_dir")
                ->setFunction(
                        function ($dir) use ($filesystem): bool {
                            $path = explode(DIRECTORY_SEPARATOR, $dir);
                            $currentDir = $filesystem;

                            for ($i = 0; $i < count($path); $i++) {

                                if (count($path) > 1 && count($path) - 1 === $i) {
                                    continue;
                                }

                                if (array_key_exists($path[$i], $currentDir) === false) {
                                    return false;
                                }

                                if (is_array($currentDir[$path[$i]]) === false) {
                                    break;
                                }

                                $currentDir = $currentDir[$path[$i]];
                            }

                            if (count($path) === 1) {
                                return true;
                            }

                            $dir = end($path);

                            if ($dir === '.' || $dir === '..' || strlen($dir) === 0 ||
                                    (array_key_exists($dir, $currentDir) === true && is_array($currentDir[$dir]) === true)) {
                                return true;
                            }

                            return false;
                        }
        );

        $this->isDirMock = $builder->build();
        $this->isDirMock->enable();

        $builder = new MockBuilder();
        $builder->setNamespace("\\De\\Xovatec\\Utils")
                ->setName("opendir")
                ->setFunction(
                        function ($path): string {
                            return $path;
                        }
        );

        $this->openDirMock = $builder->build();
        $this->openDirMock->enable();

        $builder = new MockBuilder();
        $builder->setNamespace("\\De\\Xovatec\\Utils")
                ->setName("closedir")
                ->setFunction(
                        function () {
                            return true;
                        }
        );

        $this->closeDirMock = $builder->build();
        $this->closeDirMock->enable();

        $builder = new MockBuilder();
        $builder->setNamespace("\\De\\Xovatec\\Utils")
                ->setName("readdir")
                ->setFunction(
                        function ($path) use (&$filesystem) {
                            $next = next($filesystem[$path]);
                            if (is_array($next) == true) {
                                return key($filesystem[$path]);
                            }
                            return $next;
                        }
        );

        $this->readDirMock = $builder->build();
        $this->readDirMock->enable();

        $builder = new MockBuilder();
        $builder->setNamespace("\\De\\Xovatec\\Utils")
                ->setName("file_exists")
                ->setFunction(
                        function ($filePath) use ($filesystem) {
                            $pathInfo = explode(DIRECTORY_SEPARATOR, $filePath);

                            if (array_key_exists($pathInfo[0], $filesystem) === false) {
                                return false;
                            }

                            if (in_array($pathInfo[1], $filesystem[$pathInfo[0]]) === true) {
                                return true;
                            }

                            return false;
                        }
        );

        $this->fileExistMock = $builder->build();
        $this->fileExistMock->enable();

        parent::setUp();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        $this->isDirMock->disable();
        $this->openDirMock->disable();
        $this->readDirMock->disable();
        $this->closeDirMock->disable();
        $this->fileExistMock->disable();
        unset($this->directoryUtils);
        unset($this->path);
    }

    public function testConstructWithException()
    {
        $this->expectException(UnexpectedValueException::class);
        $helper = new DirectoryUtils('isNoDir');
    }

    public function testConstruct()
    {
        $helper = new DirectoryUtils('mainDir');
        $this->assertIsObject($helper);
    }

    public function testReadFiles(): void
    {
        $expectedFiles = [
            'file1',
            'file2'
        ];
        $helper = new DirectoryUtils('mainDir');
        $files = $helper->readFiles();

        $this->assertEquals($expectedFiles, $files);
    }

    public function testGetPath(): void
    {
        $expected = 'mainDir';
        $helper = new DirectoryUtils('mainDir');
        $this->assertEquals($expected, $helper->getPath());
    }

    public function testGetName(): void
    {
        $expected = 'subDir';
        $helper = new DirectoryUtils('mainDir' . DIRECTORY_SEPARATOR . 'subDir');
        $this->assertEquals($expected, $helper->getName());
    }

    public function testGetSubDirectories(): void
    {
        $expectedDirCount = 1;
        $helper = new DirectoryUtils('mainDir');
        $directories = $helper->getSubDirectories();

        $this->assertEquals($expectedDirCount, count($directories));
    }

    public function testExistsFile(): void
    {

        $helper = new DirectoryUtils('mainDir');
        $this->assertTrue($helper->existsFile('file1'));
    }

}
