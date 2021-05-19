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

namespace De\Xovatec\Utils;

/**
 * File Utils-Klasse
 * 
 * @author bhohmann
 * @copyright hobutech // www.hobutech.de
 *
 */
class FileUtils {
	
	/**
	 * Saubert den Namen von Umlauten und Sonderzeichen
	 * 
	 * @param string $fname
	 * @param boolean $toLower
	 * @param string $specialSymbolAlternative [default=_]
	 * @return string
	 */
	public static function clearName($fname, $toLower = false, $specialSymbolAlternative = '_') {
		$bck = '';
		
		$fname = str_ireplace('Ä', 'Ae', $fname);
		$fname = str_ireplace('Ö', 'Oe', $fname);
		$fname = str_ireplace('Ü', 'Ue', $fname);
		$fname = str_ireplace('ä', 'ae', $fname);
		$fname = str_ireplace('ü', 'ue', $fname);
		$fname = str_ireplace('ö', 'oe', $fname);
		$fname = str_ireplace('ß', 'ss', $fname);
		
		$oldZeichen = '';
		
		$symbols = array(
			$specialSymbolAlternative,
			'-'
		);
		
		for($i=0;$i<strlen($fname);$i++) {
			$zeichen = substr($fname,$i,1);
			if(!preg_match("/[a-zA-Z0-9\-\_]/",$zeichen)) {
				
				if($zeichen == ' ' || $zeichen == '/') {
					$zeichen = '-';
				} else {
					$zeichen = $specialSymbolAlternative;
				}
			}
			
			if(!in_array($oldZeichen, $symbols) || !in_array($zeichen, $symbols)) {
				$bck .= $zeichen;
			}
			
			$oldZeichen = $zeichen;
		}
		
		for($i=strlen($bck)-1;$i>=0;$i--) {
			$zeichen = substr($bck,$i,1);
			
			if($zeichen != '-' && $zeichen != $specialSymbolAlternative) {
				break;
			}
			
			$bck = substr($bck,0, $i);
		}
		
		if($toLower) {
			$bck = strtolower($bck);
		}
		
		return $bck;
	}
	
	/**
	 * Liefert Infos zum Dateinamen
	 * 
	 * @param string $filename
	 * @return array - filename|extension 
	 */
	public static function getInfo($filename) {
		
		$file = array();
		
		$separator = '\\';
		
		if( defined(DIRECTORY_SEPARATOR) ) {
			$separator = DIRECTORY_SEPARATOR;
		}
		$separatorPosition = strrpos($filename, $separator) === false ? 0 : strrpos($filename, $separator)+1;
		
		$file['filename'] = substr($filename, $separatorPosition, strrpos($filename, '.'));
		$file['extension'] = substr($filename,strrpos($filename, '.')+1);
		
		return $file;
	}
	
	/**
	 * Vereinheitlicht den Verzeichnisseparator
	 * 
	 * @param string $path
	 * @throws hobuadm_Exception_Error
	 * @return string
	 */
	private static function standardizeDirectorySeparator( $path ) {
		if ( DIRECTORY_SEPARATOR == '\\' ) {
			$path = str_replace('/', '\\', $path);
		} elseif ( DIRECTORY_SEPARATOR == '/'  ) {
			$path = str_replace('\\', '/', $path);
		} else {
			throw new hobucms_Exception('Unbekannter Verzeichnissparator: '.DIRECTORY_SEPARATOR);
		}
		return $path;
	} 
	
	
	/**
	 * Liefert den Dateinamen aus einer Pfadangabe
	 * 
	 * @param string $filepath
	 * @return string
	 */
	public static function getFilename($filepath) {
		$filepath = self::standardizeDirectorySeparator($filepath);
		if(strrpos($filepath, DIRECTORY_SEPARATOR) != -1) {
			$filepath = substr($filepath, strrpos($filepath, DIRECTORY_SEPARATOR)+1);
		}
		return $filepath;
	}
	
	/**
	 * @param unknown $filepath
	 * @return Ambigous <string, string, mixed>
	 */
	public static function getDirectory($filepath) {
		$filepath = self::standardizeDirectorySeparator($filepath);
		if(strrpos($filepath, DIRECTORY_SEPARATOR) != -1) {
			$filepath = substr($filepath, 0, strrpos($filepath, DIRECTORY_SEPARATOR));
		}
		return $filepath;
	}
	
}

?>