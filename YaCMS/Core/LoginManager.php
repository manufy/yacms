<?php

namespace YaCMS\Core {

	class LoginManager   {
		
		private $YaCMS;
		
		public function __construct($YaCMS)
		{
				//parent::__construct($YaCMS); 
				$this->YaCMS = $YaCMS;
		}
		
		public function IsLoggedIn() {
			
			echo "ISLOGGEDIN: " . $this->YaCMS->osessionmanager->get('usuario');
			if ($this->YaCMS->osessionmanager->get('usuario')) 
				return true;
			return false;
		}
		
		public function ValidateLogin($usuario,$clave) {
			
			
			$dql = ("SELECT u FROM \Entities\Usuario u WHERE u.nombre='" . $usuario .  "'");
			echo "VAL:" . $dql . "<br>";
			$query = $this->YaCMS -> entitymanager -> createQuery($dql);
		
			// ToDo: Usar query unico de doctrine
			
			$usuarios = $query -> getResult();
			//echo "<pre>";
			//print_r($query);			
			
			if (count($usuarios)>1) {
				
				$primerusuario = $usuarios[0];
				echo $primerusuario->getPassword();
				if ($primerusuario->getPassword() == $clave){
					echo "yepaaaa";
										return true;
				}			
			}
			return false;
		}
		
	}
	
}
?>