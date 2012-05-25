<?php

namespace YaCMS\Core {
	
	use Doctrine\ORM\Query;
	
	include ('YaCMS/rain.tpl.class.php');
	
	class YaCMSContainer {
			
		public $pathinfo;
		public $templateEngine;
		public $classloader;
		public $entitymanager;
		public $eventmanager;	
		
		public $ouri;
		public $odispatcher;
		
		
		public $doctrineconfiguration;
		public $doctrineconnection;
		public $doctrinecache;
		public $doctrinedriverimplementation;
		
		public $ologger;
		public $baseurl;
		public $basedir;
			
		public function __construct() {
			\Analog::log('Main');
			$this->baseurl  = "http://127.0.0.1/yacms/";
			$this->pathinfo =  pathinfo($_SERVER['SCRIPT_FILENAME']);
			$this->basedir = $this->pathinfo['dirname'];
			$this->InitializeLogger();
			$this->BootStrapDoctrine();
			$this->InitializeDoctrine();
			$this->InitializeRainTPL();		
			$this->ouri = new URI();	
			$this->odispatcher = new Dispatcher($this->ouri, $this);
		
		}
		
		public function InitializeLogger() {
				\Analog::log ('Log this error');
	//		$this->ologger = \Logger::getLogger(__CLASS__);
	//		\Logger::configure($this->basedir . 'log4php.xml');
		}
		
		public function InitializeRainTPL() {	
			$this->templateEngine = new \RainTPL();
			\raintpl::configure("tpl_dir", "Views/" );
			\raintpl::configure("cache_dir", "cache/" );
			\raintpl::configure("tpl_ext", "tpl" );
   			\raintpl::configure("base_url", $this->baseurl);
		}
		
		// Rutas
		
		public function route() {
			$this->ouri->explodeuri();
			$this->odispatcher->dispatch($this);
			return;
		}
		
		public function InitializeDoctrine() {
			
		// Cargador de Clases
		
		$this->classLoader = new \Doctrine\Common\ClassLoader('Entities',  'Entities');
		$this->classLoader->register();
					
		// La conexion y la configuracion vienen de variables globales	
			
		global $conn;
		global $config;
		
		$this->eventmanager = new \Doctrine\Common\EventManager();
		$this->entitymanager = \Doctrine\ORM\EntityManager::create($this->doctrineconnection, $this->doctrineconfiguration, $this->eventmanager);
	
		}
		
		public function BootStrapDoctrine() {
			
			$APPLICATION_ENV="development";
			
			// Configurar (2)
			
			$this->doctrineconfiguration = new \Doctrine\ORM\Configuration();
			
			// Proxy Configuration (3)
			$this->doctrineconfiguration->setProxyDir(__DIR__.'/Proxies');
			$this->doctrineconfiguration->setProxyNamespace('entities\Proxies');
			$this->doctrineconfiguration->setAutoGenerateProxyClasses(($APPLICATION_ENV == "development"));
			
			// Mapping Configuration (4)
			//$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__."/config/mappings/xml");
			//$driverImpl = new Doctrine\ORM\Mapping\Driver\YamlDriver(__DIR__."/Models");
			$this->doctrinedriverimplementation = $this->doctrineconfiguration->newDefaultAnnotationDriver(__DIR__."/Entities");
			$this->doctrineconfiguration->setMetadataDriverImpl($this->doctrinedriverimplementation);
			
			// Caching Configuration (5)
			if ($APPLICATION_ENV == "development") {
			    $this->doctrinecache = new \Doctrine\Common\Cache\ArrayCache();
			} else {
			    $this->doctrinecache = new \Doctrine\Common\Cache\ApcCache();
			}
			$this->doctrineconfiguration->setMetadataCacheImpl($this->doctrinecache);
			$this->doctrineconfiguration->setQueryCacheImpl($this->doctrinecache);
			
			// database configuration parameters (6)
			$this->doctrineconnection = array(
			    'driver' => 'pdo_sqlite',
			    'path' => 'database.sqlite'
);

// obtaining the entity manager (7)
$evm = new \Doctrine\Common\EventManager();
$entityManager = \Doctrine\ORM\EntityManager::create($this->doctrineconnection, $this->doctrineconfiguration, $evm);
			
			
			
			
		}
		
		public function getdqlquery($dql) {
			$query = $this->entitymanager->createQuery($dql);
			$result = $query->getResult();
			return $result;
		}
	
		public function getdqlqueryasarray($dql) {
			$query = $this->entitymanager->createQuery($dql);
			$result = $query->getResult(Query::HYDRATE_ARRAY);
			return $result;
		}
		
		public function getdqlqueryasjson($dql) {
			/*	$result = $this->getdqlqueryasarray($dql);
			$dh = new DoctrineHelper();
			$jh = new JSONHelper();

			$rows = $dh->getdqlqueryasarray($dql);
			$result = json_encode($jh->getjsondataarray($page=1, $records=1, $total=1, $rows));
			*/
			
			$result = $this->getdqlqueryasarray($dql);
			$jh = new JSONHelper();

			$rows = $this->getdqlqueryasarray($dql);
			$result = json_encode($jh->getjsondataarray($page=1, $records=1, $total=1, $rows));
			
			
			return $result;
			
			
		}
		
		
	}
}
?>