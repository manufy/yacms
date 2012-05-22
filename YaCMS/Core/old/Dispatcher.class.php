<?php

namespace IWeb\Core {
	
		class Dispatcher {
		
			public $ouri;
			private $iweb;
		
			public function __construct($ouri, $iweb) {
				$this->ouri = $ouri;
				$this->iweb = $iweb;
			}
		
			
		
			public function dispatch($iweb) {
		
			// Procesa paginas tpl, index, '', admin y contenidos
				
		
				
				
			switch(basename($iweb->ouri->nombreVista,'.tpl')) {
				case 'index.php' :
							$controller = new \IWeb\Controllers\Index($iweb);
							$controller->draw();
	  		  					break;  
	    		case '' :
							$controller = new \IWeb\Controllers\Index($iweb);
							$controller->draw();
	  		  				break;
				
				// Ahora se procesanW las acciones globales, admin y contenidos
				
				case 'login' :
							$iweb->HTMLTemplateOutput("default/login",$iweb->ouri->ParametrosArray[count($iweb->ouri->ParametrosArray)-1]);
	                		break;
							
				case 'logout' :
							$iweb->osessionmanager->endsession();
							$controller = new \IWeb\Controllers\Index($iweb);
							$controller->draw();
	                		break;
							
				case 'contenidos' :
							$controller = new \IWeb\Controllers\Contenidos($iweb);
							$controller->draw();
	  		  				//$iweb->HTMLTemplateOutput("default/main",$iweb->ouri->ParametrosArray[count($iweb->ouri->ParametrosArray)-1]);
	                		break;
							
				case 'admin' :
							if ($iweb->ologinmanager->IsLoggedIn()) {
								$controller = new \IWeb\Controllers\Admin($iweb);
								$controller->draw();
							}
							else {
								echo("NOAUTH");
								$iweb->ohtmlhelper->a("index.php","Volver");
							}
	  		  				break;
				case 'post' :
							$controller = new \IWeb\Controllers\Post($iweb);
							$controller->draw();
							break;
			        
	    		default:	// 404 por defecto, en caso de no enontrar ni página ni acción
		            		echo'404<br>';
	    		    		break;
				}  	
		}
	}
	
}
?>