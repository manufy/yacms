<?php

spl_autoload_extensions('.php,.class.php');
set_include_path("../../../");
spl_autoload_register();


$iweb = new IWeb\Core\IWeb("http://127.0.0.1/iweb3/","../../../");



$jsondataarray = $iweb->getdqlqueryasjson("SELECT u FROM \Entities\Usuario u");
echo json_encode($jsondataarray)
?>