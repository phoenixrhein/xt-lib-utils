<?php
// ############################################################################
// *										   				 				  *											
// *                      Copyright (C) 2013 HoBuTech		 				  *
// *										   				 				  *
// ############################################################################
// *										
// * 
// *
// ****************************************************************************

namespace De\Xovatec\Utils;

/**
 * Variablen Util-Klasse
 * 
 * @author bhohmann
 * @copyright hobutech // www.hobutech.de
 *
 */
class VariableUtils {
	
	
	/**
	 * Tauscht den Inhalt in den Variablen
	 * 
	 * @param mixed $var1
	 * @param mixed $var2
	 */
	public static function toogle(&$var1, &$var2) {
		
		$temp = $var1;
		$var1 = $var2;
		$var2 = $temp;
	}
}

?>