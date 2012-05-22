<?php

use IWeb\Core;
use Doctrine\ORM\Query;

function widget_getusuario() {
	global $YaCMS;
	if ($YaCMS->ologinmanager->IsLoggedIn()) { //$iweb->osessionmanager->get('usuario')) {
		echo "Usuario: " . $iweb->osessionmanager->get('usuario');
		echo $YaCMS->ohtmlhelper->a("logout","Salir");
	}
	else {
		echo $YaCMS->ohtmlhelper->a("login.tpl","Entrar");
	}
 		
	
	
	
}




?>