<?php

namespace YaCMS\Core {

	class Dispatcher {

		public $ouri;
		private $parent;

		public function __construct($ouri, $parent) {
			$this -> ouri = $ouri;
			$this -> parent = $parent;
		}

		public function dispatch($parent) {
			//echo "Dispatch ";
			//echo basename($parent->ouri->nombreVista) . '<br>';
			
				
				//echo "SERVER:<pre>";
					//print_r($_SERVER);
			//		echo '<br>';
			// Procesa paginas tpl, index, '', admin y contenidos

			switch(basename($parent->ouri->nombreVista,'.tpl')) {
				case 'index.php' :
					$controller = new \YaCMS\Controllers\Index($parent);
					$controller -> draw();
					break;
				case '' :
					//echo "Index Controller";
					$controller = new \YaCMS\Controllers\Index($parent);
					$controller -> draw();
					break;
				
				// Ahora se procesanW las acciones globales, admin y contenidos

				case 'login' :
					$parent -> HTMLTemplateOutput("default/login", 0);
					break;

				case 'logout' :
					$parent -> osessionmanager -> endsession();
					$controller = new \YaCMS\Controllers\Index($parent);
					$controller -> draw();
					break;

				case 'contenidos' :
					$controller = new \YaCMS\Controllers\Contenidos($parent);
					$controller -> draw();
					//$parent->HTMLTemplateOutput("default/main",$parent->ouri->ParametrosArray[count($parent->ouri->ParametrosArray)-1]);
					break;

				case 'admin' :
					if ($parent -> ologinmanager -> IsLoggedIn()) {
						$controller = new \YaCMS\Controllers\Admin($parent);
						$controller -> draw();
					} else {
						echo("NOAUTH");
						$parent -> ohtmlhelper -> a("index.php", "Volver");
					}
					break;
				case 'post' :
					$controller = new \YaCMS\Controllers\Post($parent);
					$controller -> draw();
					break;

				default :
				// 404 por defecto, en caso de no enontrar ni página ni acción
					echo '404<br>';
					
					break;
			}

			echo "ouri:<pre>";
			print_r($parent -> ouri);
			echo '<br>';
		//	echo "server:<pre>";
		//	print_r($_SERVER);
		//	echo '<br>';
		//	echo "req:<pre>";
		//	print_r($_REQUEST);
		//	echo '<br>';
			
		}

	}

}
?>