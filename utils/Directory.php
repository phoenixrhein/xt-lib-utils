<?php
// ############################################################################
// *										   				 				  *											
// *                      Copyright (C) 2016 HoBuTech		 				  *
// *										   				 				  *
// ############################################################################
// *										
// * 
// *
// ****************************************************************************


/**
 * Directory Util Klasse
 * 
 * @author User
 *
 */
class hobulib_Utils_Directory {
	
	/**
	 * @var string
	 */
	private $path = null;
	
	/**
	 * Directory Util Klasse / Constructor
	 * 
	 * @param string $path
	 * @throws hobucms_Exception
	 */
	public function __construct($path) {
		
		if(!is_dir($path)) {
			throw new hobucms_Exception("'$path' ist kein Verzeichnis");
		}
		
		if(!file_exists($path)) {
			throw new hobucms_Exception("Das Verzeichnis '$path' existoert nicht");
		}
		
		$this->path = $path;
	}
	
	/**
	 * Liest die Datein ein dem Verzeichnis aus
	 * 
	 * @return array 
	 */
	public function readFiles() {
		$files = array();
		if ($handle = opendir($this->path)) {
		
			while (false !== ($file = readdir($handle))) {
				if(is_dir($this->path.'/'.$file)) {
					continue;
				}
			
				$files[] = $file;
			}

			closedir($handle);
		}
		return $files;
	}
	
	/**
	 * Liefert den Verzeichnispfad
	 * 
	 * @return string
	 */
	public function getParth() {
		return $this->path;
	}
	
	/**
	 * Liefert den Verzeichnisnamen
	 * 
	 * @return string
	 */
	public function getName() {
		return basename($this->path);
	}
	
	/**
	 * Liefert die Unterverzeichnisse
	 * 
	 * @return multitype:hobulib_Utils_Directory 
	 */
	public function readDirectories() {
		$directories = array();
		if ($handle = opendir($this->path)) {
	
			while (false !== ($dir = readdir($handle))) {
				if(!is_dir($this->path.'/'.$dir)) {
					continue;
				}
				
				if(in_array($dir, array('.', '..'))) {
					continue;
				}
					
				$directories[] = new hobulib_Utils_Directory($this->path.'/'.$dir);
			}
	
			closedir($handle);
		}
		return $directories;
	}
	
	/**
	 * Existiert die Datei in dem Ordner
	 * 
	 * @param string $filename
	 * @return boolean
	 */
	public function existsFile($filename) {
		return file_exists($this->getParth().DIRECTORY_SEPARATOR.$filename);
	}
}