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
 * String Utils
 * 
 * @author Bastian Hohmann <xt>
 * @copyright xovatec // www.xovatec.de
 *
 */
class StringUtils
{

    /**
     * Checks if a string ends with the specified character(s)
     * 
     * @param string $string
     * @param string|array $search
     * @return boolean
     */
    public static function endsWith(string $string, $search): bool
    {
        if (!is_array($search)) {
            $search = array($search);
        }

        foreach ($search as $searchEntry) {
            if (substr($string, 0 - strlen($searchEntry)) == $searchEntry) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if a string ends with the specified character<br>
     * If the character is missing at the end, it is added and the string is returned
     * 
     * @param string $string
     * @param string $search
     * @return string
     */
    public static function appendEndsWith(string $string, string $search): string
    {
        if (self::endsWith($string, $search) == false) {
            return $string . $search;
        }

        return $string;
    }

    /**
     * Checks if a string starts with the specified character
     * 
     * @param string $string
     * @param string $search
     * @return boolean
     */
    public static function startWith(string $string, string $search): bool
    {
        if (strpos($string, $search) === 0) {
            return true;
        }

        return false;
    }

}
