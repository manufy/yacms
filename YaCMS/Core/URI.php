<?php

namespace YaCMS\Core {

	class URI {

		public $parametro;
		public $servername;
		public $scriptfilename;
		// Contiene el nombre del script ejecutandose, ej. index.php
		public $requestUri;
		public $scriptName;
		public $urlparseada;
		public $ControladorPrincipalPathArray;
		public $explodedURIArray;
		public $nombreVista;
		public $ParametrosArray;

		public function __construct() {

			$this -> servername = $_SERVER['SERVER_NAME'];
			$this -> scriptfilename = $_SERVER['SCRIPT_FILENAME'];
			$this -> requestUri = $_SERVER['REQUEST_URI'];
			$this -> scriptName = $_SERVER['SCRIPT_NAME'];
			$this -> explodedURIArray = explode('/', $this -> requestUri);
			$this -> ControladorPrincipalPathArray = explode('/', $this -> nombreVista);

		}

		public function explodeuri() {

			$this -> urlparseada = parse_url($_SERVER['REQUEST_URI']);
			//	iweb_debughtmlout($this->urlparseada)	;
			for ($i = 0; $i < sizeof($this -> ControladorPrincipalPathArray); $i++) {
				if ($this -> explodedURIArray[$i] == $this -> ControladorPrincipalPathArray[$i]) {
					unset($this -> explodedURIArray[$i]);
				}
			}
			$this -> ParametrosArray = array_values($this -> explodedURIArray);

			// TODO: Mejorar algoritmo

			$this -> nombreVista = $this -> explodedURIArray[count($this -> explodedURIArray)];

			// Si nombreVista no es "" o index.php hay que parsear el nombre de forma distinta
			
			
			echo "NombreVistaInicial: " . $this->nombreVista . "<br>";
			if (($this -> nombreVista <> "index.php") && ($this -> nombreVista <> "") ) {

					$this -> nombreVista = $this -> explodedURIArray[count($this -> explodedURIArray) -1];
				echo "NombreVista no index no blank: " . $this->nombreVista."<br>";
			}	
			if (($this -> nombreVista <> "contenidos")&& ($this -> nombreVista <> "admin")) {
					
					$this -> nombreVista = $this -> explodedURIArray[count($this -> explodedURIArray)]; 
			echo "NombreVista contenidos " . $this->nombreVista."<br>";

					$this -> parametro = $this -> explodedURIArray[count($this -> explodedURIArray)];
					
					
					
		
			}

			return $this -> ParametrosArray;

		}

	}

}
?>