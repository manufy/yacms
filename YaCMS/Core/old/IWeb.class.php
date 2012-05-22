<?php

use Doctrine\ORM;
use Doctrine\Common;

namespace IWeb\Core {
	
	
	include ('lib/rain.tpl.class.php');
	include ('doctrine-2.2-iweb-bootstrap.php');


	class IWeb {
		
		
		public $templateEngine;
		
		public $entitymanager;
		public $eventmanager;
		public $classloader;
	
		public $obenchmark;
		public $ouri;
		public $odispatcher;
		public $ologinmanager;
		public $ologger;
		public $osessionmanager;
		public $ohtmlhelper;
		
		public function __construct($baseurl) {
		
		spl_autoload_register();
		
		
	//	echo "<pre>";
	//	print_r($_SERVER);
	//	die();
		
		global $conn;
		global $config;
	  //  $this->ologger = \Logger::getLogger(__CLASS__);
		//\Logger::configure('log4php.xml');
	//	$this->ologger ->info("foo");
		//$this->ologger ->warn("bar");
		$this->ohtmlhelper = new HTMLHelper();
		$this->osessionmanager = new SessionManager();
		$this->obenchmark = new Benchmark();	
		$this->ologinmanager = new LoginManager($this);
		$this->ouri = new Uri();	
		$this->odispatcher = new Dispatcher($this->ouri, $this);
		$this->eventmanager = new \Doctrine\Common\EventManager();
		$this->entitymanager = \Doctrine\ORM\EntityManager::create($conn, $config, $this->eventmanager);
		$this->classLoader = new \Doctrine\Common\ClassLoader('Entities',  'Entities');
		$this->classLoader->register();
		
		\raintpl::configure("tpl_dir", "Views/" );
		\raintpl::configure("cache_dir", "cache/" );
		\raintpl::configure("tpl_ext", "tpl" );
   		\raintpl::configure("base_url", $baseurl);
		
		$this->templateEngine = new \RainTPL();
			
		}
	
		public function getDoctrineHelper() {
			
			return new \IWeb\Core\DoctrineHelper();
		}
	
		public function TemplateEngineFactory($tpl_dir)
		{
			$newraintpl = new \RainTPL();
			$newraintpl::configure("tpl_dir", $tpl_dir );
			$newraintpl::configure("cache_dir", "cache/" );
			$newraintpl::configure("tpl_ext", "tpl" );
			$newraintpl::configure("base_url", $baseurl );
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