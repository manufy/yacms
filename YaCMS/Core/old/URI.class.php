<?php

namespace IWeb\Core {
	
		class URI  {
		
	
		
		public $urlparseada;
		public $ControladorPrincipalPathArray;
		public $explodedURIArray;
		public $nombreVista;
		public $ParametrosArray;
		
		public function __construct() {
			
		
			$requestUri = $_SERVER['REQUEST_URI'];
			$this->nombreVista = $_SERVER['SCRIPT_NAME'];	
			$this->explodedURIArray =  explode('/', $requestUri);
			$this->ControladorPrincipalPathArray  =  explode('/', $this->nombreVista);
			$this->nombreVista = $this->ControladorPrincipalPathArray[count($this->ControladorPrincipalPathArray)-1];
	
		}
		
		public function explodeuri() {
			
		$this->urlparseada = parse_url($_SERVER['REQUEST_URI']);
		//	iweb_debughtmlout($this->urlparseada)	;
		for($i= 0;$i < sizeof($this->ControladorPrincipalPathArray);$i++) {
	      	if ($this->explodedURIArray[$i] == $this->ControladorPrincipalPathArray[$i]) {
		 		unset($this->explodedURIArray[$i]);
	        }
	    }
	    $this->ParametrosArray = array_values($this->explodedURIArray);
		//iweb_debughtmlout($this->ParametrosArray)	;
		if (count($this->ParametrosArray)>0) 	// Si no se pudo extraer el nombre de la pagina del URI
			$this->nombreVista = $this->ParametrosArray[0];//[count($this->ParametrosArray)-1];
		return $this->ParametrosArray;	
		
		}
	}
	
}
?>