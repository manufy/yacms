<?php

include_once '/lib/php4jquery/lib/YepSua/Labs/RIA/jQuery4PHP/YsJQueryAutoloader.php';
YsJQueryAutoloader::register();

function adminwidget_adminusuarios() {



YsJQuery::newInstance()
  ->onClick()
  ->in('#miboton')
 // ->executeOnReady('alert("Hello World")')
 ->executeOnReady("location.href='crearusuario'")
  ->write();

}
?>