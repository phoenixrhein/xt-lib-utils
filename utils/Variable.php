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

/**
 * Variablen Util-Klasse
 * 
 * @author bhohmann
 * @copyright hobutech // www.hobutech.de
 *
 */
class hobulib_Utils_Variable {
	
	
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