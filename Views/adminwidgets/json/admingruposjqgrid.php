<?php
spl_autoload_extensions('.php,.class.php');
set_include_path("../../../");
spl_autoload_register();

$dh = new IWeb\Core\DoctrineHelper();
echo $dh->getdqlqueryasjson("SELECT u FROM \Entities\Grupo u");

?>