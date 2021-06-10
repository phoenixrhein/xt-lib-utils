<?php

/*
 * 
 * (c) xt <Bastian Hohmann> 
 * 
 * @link http://www.xovatec.de
 * 
 */

namespace De\Xovatec\Utils;

use De\Xovatec\Dto\FilepathInfo;
use UnexpectedValueException;

/**
 * File Utils
 * 
 * @author Bastian Hohmann <xt>
 * @copyright xovatec // www.xovatec.de
 *
 */
class FileUtils
{

    /**
     * Cleans the name from umlauts and special characters
     * 
     * @param string $name
     * @param bool $toLower [default=false]
     * @param string $symbol [default=-]
     * @return string
     */
    public static function clearName(string $name, bool $toLower = false, string $symbol = '-'): string
    {
        $clearedName = '';

        $name = str_ireplace('Ä', 'Ae', $name);
        $name = str_ireplace('Ö', 'Oe', $name);
        $name = str_ireplace('Ü', 'Ue', $name);
        $name = str_ireplace('ä', 'ae', $name);
        $name = str_ireplace('ü', 'ue', $name);
        $name = str_ireplace('ö', 'oe', $name);
        $name = str_ireplace('ß', 'ss', $name);

        $prevChar = '';

        for ($i = 0; $i < strlen($name); $i++) {
            $char = substr($name, $i, 1);
            if (!preg_match("/[a-zA-Z0-9\-\_]/", $char)) {
                $char = $symbol;
            }

            //Only if the previous and current character is not a symbol
            if ($prevChar !== $symbol || $char !== $symbol) {
                $clearedName .= $char;
            }

            $prevChar = $char;
        }

        //remove symbol at the end
        while (StringUtils::endsWith($clearedName, $symbol) === true) {
            $clearedName = substr($clearedName, 0, strlen($clearedName) - 1);
        }

        if ($toLower) {
            $clearedName = strtolower($clearedName);
        }

        return $clearedName;
    }

    /**
     * Get file path information
     * 
     * @param string $filepath
     * @return FilepathInfo
     */
    public static function getFilePathInfo(string $filepath): FilepathInfo
    {
        $pathinfo = pathinfo(self::standardizeDirectorySeparator($filepath));

        $fileinfo = new FilepathInfo();
        $fileinfo->setDirname($pathinfo['dirname']);
        $fileinfo->setBasename($pathinfo['basename']);
        $fileinfo->setFilename($pathinfo['filename']);
        $fileinfo->setExtension($pathinfo['extension']);

        return $fileinfo;
    }

    /**
     * Standardize directory separator
     * 
     * @param string $path
     * @throws UnexpectedValueException
     * @return string
     */
    private static function standardizeDirectorySeparator(string $path): string
    {
        if (DIRECTORY_SEPARATOR == '\\') {
            $path = str_replace('/', '\\', $path);
        } elseif (DIRECTORY_SEPARATOR == '/') {
            $path = str_replace('\\', '/', $path);
        } else {
            throw new UnexpectedValueException('Unbekannter Verzeichnissparator: ' . DIRECTORY_SEPARATOR);
        }
        return $path;
    }

}
