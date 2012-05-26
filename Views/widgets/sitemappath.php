<?php

use YaCMS\Core;
use Doctrine\ORM\Query;

function widget_getusuario($baseurl) {
	echo "mapppach";
	return;
	global $YaCMS;
	echo "baseurl:" . $baseurl;
	if ($YaCMS->ologinmanager->IsLoggedIn()) { //$iweb->osessionmanager->get('usuario')) {
		
		echo "Usuario: " . $YaCMS->osessionmanager->get('usuario');
		echo $YaCMS->ohtmlhelper->a($baseurl ."logout","Salir");
	}
	else {
		echo $YaCMS->ohtmlhelper->a($baseurl . "login.tpl","Enddrar");
	}
 		
	
	
	
}




?>