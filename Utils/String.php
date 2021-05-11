<?php
// ############################################################################
// *										   				 				  *											
// *                      Copyright (C) 2012 HoBuTech		 				  *
// *										   				 				  *
// ############################################################################
// *										
// * 
// *
// ****************************************************************************

/**
 * Utils-Klasse für Strings
 * 
 * @author bhohmann
 * @copyright hobutech // www.hobutech.de
 *
 */
class hobulib_Utils_String {
	
	
	/**
	 * Prüft, ob ein String mit dem angebenen Zeichen endet
	 * 
	 * @param string $string
	 * @param string|array $search
	 * @return boolean
	 */
	public static function endsWith($string, $search) {
		
		if(!is_array($search)) {
			$search = array($search);
		}
		foreach ($search as $searchEntry) {
			//NOTICE HoB Abfrage war fehlerhaft
			//if(strrpos($string, $search, strlen($string)-1) !== false) {
			if(substr($string,0-strlen($searchEntry)) == $searchEntry) {			
				return true;
			}
		}
		
		return false;
	}
	
	/**
	 * Prüft, ob ein String mit dem angebenen Zeichen endet<br>
	 * Fehlt das Zeichen am Ende, wird es hinzugefügt und der String zurückgeliefert
	 * 
	 * @param string $string
	 * @param string $search
	 * @return string
	 */
	public static function appendEndsWith($string, $search) {
		
		if(self::endsWith($string, $search) == false) {
			return $string.$search;
		}
		
		return $string;
	}
	
	/**
	 * Prüft, ob ein String mit dem angegebenen Zeichen beginnt
	 * 
	 * @param string $string
	 * @param string $search
	 * @return boolean
	 */
	public static function startWith($string, $search) {
		
		//Achtung findet das letzte Vorkommen / wurde geaendert. Asuwirkungen?
		if(strpos($string, $search) === 0) {
			return true;
		}
		
		return false;		
	}
}

?>