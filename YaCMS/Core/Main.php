<?php

use Doctrine\ORM;
use Doctrine\Common;

namespace YaCMS\Core {
	
	class Main extends YaCMSContainer {				
		
		public $obenchmark;
		public $ouri;
		public $odispatcher;
		public $ologinmanager;
		public $osessionmanager;
		public $ohtmlhelper;
		
		public function __construct($baseurl="", $basedir="") {
		
			spl_autoload_register();
		
			// Inicializar Doctrine y RainTPL
		
			parent::__construct($baseurl,$basedir);
		
			// Inicializar CMS
		
			global $conn;
			global $config;
		//	$this->ologger ->info("foo");
		//	$this->ologger ->warn("bar");
			$this->ohtmlhelper = new HTMLHelper();
			$this->osessionmanager = new SessionManager();
			$this->obenchmark = new Benchmark();	
			$this->ologinmanager = new LoginManager($this);
			$this->ouri = new Uri();	
			$this->odispatcher = new Dispatcher($this->ouri, $this);
		

		}
	
		public function getDoctrineHelper() {
			
			return new \IWeb\Core\DoctrineHelper($this);
		}
	
		public function TemplateEngineFactory($tpl_dir)
		{
			$newraintpl = new \RainTPL();
			$newraintpl::configure("tpl_dir", $tpl_dir );
			$newraintpl::configure("cache_dir", "cache/" );
			$newraintpl::configure("tpl_ext", "tpl" );
			$newraintpl::configure("base_url", $this->baseurl );
			return $newraintpl;
		}
		
		public function HTMLTemplateOutput($sTemplate,$contenidoid) {
			
			// Kludge, eliminamos el contenido de la cache para generacion dinamica
			//	   array_map('unlink',glob('contenido/*'));//==@rmdir($path)
			   
			if( $cache = $this->templateEngine->cache($sTemplate, 60, $contenidoid) ) {
				echo $cache;
				$this->obenchmark->echostats("CACHE");
				return;
			}
			$this->templateEngine->assign( "iweb", $this); 
			$this->templateEngine->assign( "baseurl", \RainTPL::$base_url ); 
			$this->templateEngine->assign( "contenidoid", $contenidoid ); 
		    $html = $this->templateEngine->draw($sTemplate,$return_string = true);	
			echo $html;
			$this->obenchmark->echostats("RENDER");
		}
			
		// Routing de la página solicitada en el URI
		// Si la página existe, ya la devuelve el propio apache
		
		function route() {
			$this->ouri->explodeuri();
			$this->odispatcher->dispatch($this);
			return;
		}
		
	}
}
	?>