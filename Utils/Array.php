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
 * Array Utils
 * 
 * @author bhohmann
 * @copyright hobutech // www.hobutech.de
 *
 */
class hobulib_Utils_Array {
	
	/**
	 * Verbindet Array-Elemente zu einem String,<br>
	 * aber loescht vorher leere Eintrage aus dem Array
	 * 
	 * @param string $glue
	 * @param array $pieces
	 * @return string
	 */
	public static function implode($glue , array $pieces ) {
		
		$tmpArray = self::removeEmpty($pieces);
		
		return implode($glue, $tmpArray);
	}
	
	/**
	 * Prüft, ob die Keys alles Zahlen sind
	 * 
	 * @param array $array
	 * @return boolean
	 */
	public static function isNumericKeys(array $array) {
		foreach ($array as $key => $value ) {
			if ( !is_numeric($key)) {
				return false;
			}
		}
		return true;
	}
	
	/**
	 * Leert leere Eintraege aus dem Array
	 * 
	 * @param array $array
	 * @return array
	 */
	public static function removeEmpty(array $array) {
		
		$tmpArray = array();
		
		foreach ($array as $value) {
			if($value) {
				$tmpArray[] = $value;
			}
		}	

		return $tmpArray;
	}
	
	/**
	 * Beinhaltet der erste Eintrag ein Array?
	 * 
	 * @param array $array
	 * @return boolean
	 */
	public static function isRecursive(array $array) {
		if(is_array(current($array))) {
			return true;
		}
		
		return false;
	}
}

?>