<?php

namespace YaCMS\Core {
	
		class URI  {
		
	
		public $requestUri;
		public $scriptName;
		public $urlparseada;
		public $ControladorPrincipalPathArray;
		public $explodedURIArray;
		public $nombreVista;
		public $ParametrosArray;
		
		public function __construct() {
			
			
			$this->requestUri = $_SERVER['REQUEST_URI'];
			$this->scriptName = $_SERVER['SCRIPT_NAME'];	
			$this->explodedURIArray =  explode('/', $this->requestUri);
			$this->ControladorPrincipalPathArray  =  explode('/', $this->nombreVista);
			
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
		
		// TODO: Mejorar algoritmo
		
		$this->nombreVista = $this->explodedURIArray[2];		
			
		return $this->ParametrosArray;	
		
		}
	}
	
}
?>