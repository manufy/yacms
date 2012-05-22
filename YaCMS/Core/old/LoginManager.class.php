<?php

namespace IWeb\Core {

	class LoginManager {
		
		private $iweb;
		
		public function __construct($iweb)
		{
				$this->iweb = $iweb;
		}
		
		public function IsLoggedIn() {
			
			if ($this->iweb->osessionmanager->get('usuario')) 
				return true;
			return false;
		}
		
		public function ValidateLogin($usuario,$clave) {
			
			$dh = $this->iweb->getDoctrineHelper();
			$usuario= $dh->getdqlquery("SELECT u FROM \Entities\Usuario u WHERE u.nombre='" . $usuario .  "'");
			if (count($usuario)>1) {
				
				$primerusuario = $usuario[0];
				echo $primerusuario->getPassword();
				if ($primerusuario->getPassword() == $clave){
					return true;
				}			
			}
			return false;
		}
		
	}
	
}
?>