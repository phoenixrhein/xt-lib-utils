<?php

/*
 * 
 * (c) xt <Bastian Hohmann> 
 * 
 * @link http://www.xovatec.de
 * 
 */

namespace De\Xovatec\Utils;

use UnexpectedValueException;

/**
 * Directory Utils
 * 
 * @author Bastian Hohmann <xt>
 * @copyright xovatec // www.xovatec.de
 *
 */
class DirectoryUtils
{

    /**
     * @var string
     */
    private ?string $path = null;

    /**
     * Directory Utils Constructor
     * 
     * @param string $path
     * @throws UnexpectedValueException
     */
    public function __construct(string $path)
    {
        if (!is_dir($path)) {
            throw new UnexpectedValueException("'{$path}' is no directory");
        }

        $this->path = $path;
    }

    /**
     * Read only files from directory
     * 
     * @return array 
     */
    public function readFiles(): array
    {
        $files = array();
        $handle = opendir($this->path);
        if ($handle) {

            while (false !== ($file = readdir($handle))) {
                if (is_dir($this->path . DIRECTORY_SEPARATOR . $file)) {
                    continue;
                }

                $files[] = $file;
            }

            closedir($handle);
        }
        return $files;
    }

    /**
     * Get directory path
     * 
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Get directory base name
     * 
     * @return string
     */
    public function getName(): string
    {
        return basename($this->path);
    }

    /**
     * Get sub directories
     * 
     * @return DirectoryUtils[]
     */
    public function getSubDirectories(): array
    {
        $directories = array();
        $handle = opendir($this->path);
        if ($handle) {

            while (false !== ($dir = readdir($handle))) {
                if (!is_dir($this->path . DIRECTORY_SEPARATOR . $dir) || in_array($dir, array('.', '..')) === true) {
                    continue;
                }

                $directories[] = new DirectoryUtils($this->path . DIRECTORY_SEPARATOR . $dir);
            }

            closedir($handle);
        }
        return $directories;
    }

    /**
     * If the file exists in the folder
     * 
     * @param string $filename
     * @return bool
     */
    public function existsFile(string $filename): bool
    {
        return file_exists($this->getPath() . DIRECTORY_SEPARATOR . $filename);
    }

}
