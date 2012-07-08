<?php

namespace YaCMS\Core {

	class URI {

		private $parametro;
		private $servername;
		private $scriptfilename;
		private $url;
		//	public $requestUri;
		private $scriptName;
		private $scriptNamePathInfo;
		private $urlparseada;
		public $nombreVista;
		//public $ParametrosArray;
		public  $baseurl;
		//public $parsedurl;
		//public $basedir;
		//	public $requestUriPathinfo;
		private $parametrosurl;
		public $parametros;

		public function __construct() {

			$this -> servername = $_SERVER['SERVER_NAME'];
			$this -> scriptfilename = $_SERVER['SCRIPT_FILENAME'];
			//	//$this -> requestUri = $_SERVER['REQUEST_URI'];
			$this -> scriptName = $_SERVER['SCRIPT_NAME'];
			//	$requestUriPathinfo = pathinfo($this->requestUri);
			$this -> url = "http://" . $this -> servername . $_SERVER['REQUEST_URI'];
			$this -> scriptNamePathInfo = pathinfo($this -> scriptName);
			$this -> baseurl = "http://" . $this -> servername . $this -> scriptNamePathInfo['dirname'] . "/";
			$this -> urlparseada = parse_url($_SERVER['REQUEST_URI']);
		}

		public function explodeuri() {

			$posparametros = strpos($this -> urlparseada['path'], $this -> scriptNamePathInfo['dirname']);
			$posparametros .= strlen($this -> scriptNamePathInfo['dirname']) + 1;
			$this -> parametrosurl = substr($this -> urlparseada['path'], $posparametros);
			$this -> parametros = explode("/", $this -> parametrosurl);
			$this -> nombreVista = $this -> parametros[0];
		}

	}

}
?>