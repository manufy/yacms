<?php

namespace YaCMS\Core {

	class URI {

		public $parametro;
		public $servername;
		public $scriptfilename;
		public $url;
		// Contiene el nombre del script ejecutandose, ej. index.php
		public $requestUri;
		public $scriptName;
		public $scriptNamePathInfo;
		public $urlparseada;
		public $ControladorPrincipalPathArray;
		public $explodedURIArray;
		public $nombreVista;
		public $ParametrosArray;
		public $baseurl;
		public $parsedurl;
		public $basedir;
		public $requestUriPathinfo;

		public function __construct() {

			$this -> servername = $_SERVER['SERVER_NAME'];
			$this -> scriptfilename = $_SERVER['SCRIPT_FILENAME'];
			$this -> requestUri = $_SERVER['REQUEST_URI'];
			$this -> scriptName = $_SERVER['SCRIPT_NAME'];
			$requestUriPathinfo = pathinfo($this->requestUri);
			$this -> explodedURIArray = explode('/', $this -> requestUri);
			$this -> ControladorPrincipalPathArray = explode('/', $this -> nombreVista);
			$this -> url = "http://" . $this->servername . $this->requestUri;
			// Base URL EJ. http://a.b.c/yacms/ = /yacms
			$this -> scriptNamePathInfo = pathinfo($this->scriptName);
			$this -> baseurl =  "http://" . $this->servername . $this->scriptNamePathInfo['dirname']."/";
			$this -> urlparseada = parse_url($this -> requestUri);
			
		//	$this->basedir =  $this->pathinfo['dirname'];
		}

		public function explodeuri() {

			//	iweb_debughtmlout($this->urlparseada)	;
		//	for ($i = 0; $i < sizeof($this -> ControladorPrincipalPathArray); $i++) {
			//	if ($this -> explodedURIArray[$i] == $this -> ControladorPrincipalPathArray[$i]) {
				//	unset($this -> explodedURIArray[$i]);
				//}
		//	}
		$pos = strpos($this->urlparseada['path'], $this->scriptNamePathInfo['dirname']);
		$pos+=count( $this->scriptNamePathInfo['dirname'])+1;
		echo "resto: " . substr($this->urlparseada['path'],$pos);
		echo "pos: " . $pos;
		
		
			$this -> ParametrosArray = array_values($this -> explodedURIArray);

			// TODO: Mejorar algoritmo

			$this -> nombreVista = $this -> explodedURIArray[count($this -> explodedURIArray)-1];

			// Si nombreVista no es "" o index.php hay que parsear el nombre de forma distinta
			
			
	/*		echo "NombreVistaInicial: " . $this->nombreVista . "<br>";
			if (($this -> nombreVista <> "index.php") && ($this -> nombreVista <> "") ) {

					$this -> nombreVista = $this -> explodedURIArray[count($this -> explodedURIArray) -1];
				echo "NombreVista no index no blank: " . $this->nombreVista."<br>";
			}	
			if (($this -> nombreVista == "contenidos")|| ($this -> nombreVista == "admin")) {
					
					//$this -> nombreVista = $this -> explodedURIArray[count($this -> explodedURIArray)]; 
					echo "NombreVista parametros " . $this->nombreVista."<br>";

					$this -> parametro = $this -> explodedURIArray[count($this -> explodedURIArray)];
					
					
					
		
			}

			$this->parsedurl = parse_url($this->url);
			echo "parseurl;<pre>";
			print_r($this->parsedurl);

			$this->parseduri= pathinfo($this -> requestUri);
			echo "parseduri<pre>";
			print_r($this->parseduri);
			
			
			$this -> nombreVista  = $this->parseduri['basename'];
			
			// Redirige dominio por defecto a index, Windows 6 Unix 
		   	if (($this->parseduri['dirname'] == "\\") ) {
		   		$this -> nombreVista  = "";
		   	}
			if (($this->parseduri['dirname'] == "/") ) {
				echo "yguydgscuyds";
		   		$this -> nombreVista  = "";
		   	}*/
			
			// Si es contenidos, reformatea como Controller/Action/Parameters
			
			
		/*	if ((basename($miinfo['dirname'])) == "contenidos")
			{
						$this -> nombreVista = $this -> explodedURIArray[count($this -> explodedURIArray) -1];
			
					$this -> parametro = $this -> explodedURIArray[count($this -> explodedURIArray)];				
			}
			
			if ((basename($miinfo['dirname'])) == "admin")
			{
						$this -> nombreVista = $this -> explodedURIArray[count($this -> explodedURIArray) -1];
			
					$this -> parametro = $this -> explodedURIArray[count($this -> explodedURIArray)];				
			}*/
		 
		   	echo "ScriptName siempre apunta al index, o sea que lo que hay antes en su path es el serverpath";
			return $this -> ParametrosArray;

		}

	}

}
?>