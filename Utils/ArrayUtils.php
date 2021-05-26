<?php

/*
 * 
 * (c) xt <Bastian Hohmann> 
 * 
 * @link http://www.xovatec.de
 * 
 */

namespace De\Xovatec\Utils;

/**
 * Array Utils
 * 
 * @author Bastian Hohmann <xt>
 * @copyright xovatec // www.xovatec.de
 *
 */
class ArrayUtils
{

    /**
     * Join array content to an string<br>
     * and deletes empty entries from the array
     * 
     * @param string $glue
     * @param array $pieces
     * @return string
     */
    public static function implode(string $glue, array $pieces): string
    {

        $tmpArray = self::removeEmpty($pieces);

        return implode($glue, $tmpArray);
    }

    /**
     * Checks if the keys are all numbers
     * 
     * @param array $array
     * @return bool
     */
    public static function isNumericKeys(array $array): bool
    {
        foreach ($array as $key => $value) {
            if (!is_numeric($key)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Remove empty value of an array
     * 
     * @param array $array
     * @return array
     */
    public static function removeEmpty(array $array): array
    {

        $tmpArray = array();

        foreach ($array as $value) {
            if ($value) {
                $tmpArray[] = $value;
            }
        }

        return $tmpArray;
    }

    /**
     * Contains the first array value also an array
     * 
     * @param array $array
     * @return bool
     */
    public static function isRecursive(array $array): bool
    {
        if (is_array(current($array))) {
            return true;
        }

        return false;
    }

}

?>