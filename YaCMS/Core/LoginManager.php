<?php

namespace YaCMS\Core {

	class LoginManager   {
		
		//private $YaCMS;
		
		public function __construct($YaCMS)
		{
				//parent::__construct($YaCMS); //$this->YaCMS = $YaCMS;
		}
		
		public function IsLoggedIn() {
			return false;
			
			if ($this->YaCMS->osessionmanager->get('usuario')) 
				return true;
			return false;
		}
		
		public function ValidateLogin($usuario,$clave) {
			
			
			$dh = $this->YaCMS->getDoctrineHelper();
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