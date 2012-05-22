<?php 
//use Doctrine\ORM\Query; 
// Es llamado desde el controlador Post, acceso a todas las librerias

//$dh = new IWeb\Core\DoctrineHelper();
//$usuario= $dh->getdqlquery("SELECT u FROM \Entities\Usuario u WHERE u.nombre='yo'");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$IsValidUser = $this->iweb->ologinmanager->ValidateLogin($usuario,$clave);
if ($IsValidUser) {
	$this->iweb->osessionmanager->set('usuario', $usuario);
	echo $this->iweb->ohtmlhelper->a('..\index.php','Volver');	
	//header("location: index.php");
	//echo "LOGGED IN";
}
else {
	echo "NOT AUTH";
	echo $this->iweb->ohtmlhelper->a('..\index.php','Volver');	
}


?>