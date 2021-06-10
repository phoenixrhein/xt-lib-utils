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
 * Variable Utils
 * 
 * @author Bastian Hohmann <xt>
 * @copyright xovatec // www.xovatec.de
 *
 */
class VariableUtils
{

    /**
     * Toggle the content in the variables
     * 
     * @param mixed $var1
     * @param mixed $var2
     * @return void
     */
    public static function toggle(&$var1, &$var2): void
    {
        $temp = $var1;
        $var1 = $var2;
        $var2 = $temp;
    }

}

?>