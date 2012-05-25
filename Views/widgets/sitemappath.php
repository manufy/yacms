<?php

use IWeb\Core;
use Doctrine\ORM\Query;

function widget_getusuario($baseurl) {
	global $YaCMS;
	echo "baseurl:" . $baseurl;
	if ($YaCMS->ologinmanager->IsLoggedIn()) { //$iweb->osessionmanager->get('usuario')) {
		
		echo "Usuario: " . $YaCMS->osessionmanager->get('usuario');
		echo $YaCMS->ohtmlhelper->a("logout","Salir");
	}
	else {
		echo $YaCMS->ohtmlhelper->a($baseurl . "login.tpl","Enddrar");
	}
 		
	
	
	
}




?>