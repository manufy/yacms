<?php
echo "Bootstraping ...\n";
include ('bootstrap.php');
echo "Doctrine Bootstrap OK.\n";

iweb_creausuarioinicial();
iweb_creestructurainicial();
iweb_creamenuadmin();
iweb_creagrupoinicial();

function iweb_creausuarioinicial()
{
	global $entityManager;
	echo "Creando Usuario Inicial ... ";
	$user = new \Entities\Usuario();
	$user->setNombre("yo");
	$user->setPassword("demo");
	echo "Persistiendo Usuario Inicial ... ";
	$entityManager->persist($user);
	echo "Usuario grabado en BBDD.\n";
}

function iweb_creagrupoinicial()
{
	global $entityManager;
	echo "Creando Grupo Inicial ... ";
	$grupo = new \Entities\Grupo();
	$grupo->setNombre("Administradores");

	echo "Persistiendo Grupo Inicial ... ";
	$entityManager->persist($grupo);
	$entityManager->flush();
	echo "Grupo grabado en BBDD.\n";
}

function iweb_creestructurainicial()
{
	global $entityManager;
	echo "Creando Estructura inicial ... ";
	$estructura = new \Entities\Estructura();
	
	$estructura->setTitulo("Menu Inicial 1");
	echo "Persistiendo Estructura Inicial 1 ... ";
	$entityManager->persist($estructura);
	$entityManager->flush();
	$estructura = new \Entities\Estructura();
	$estructura->setTitulo("Menu Inicial 2");
	echo "Persistiendo Estructura Inicial 2 ... ";
	$entityManager->persist($estructura);
	$entityManager->flush();
	$estructura = new \Entities\Estructura();
	$estructura->setTitulo("Menu Inicial 3");
	echo "Persistiendo Estructura Inicial 3 ... ";
	$entityManager->persist($estructura);
	$entityManager->flush();
	echo "Estructura grabada en BBDD.\n";
}

function iweb_creamenuadmin()
{
	
	global $entityManager;
	echo "Creando Menu inicial ... ";
	$menuadmin = new \Entities\MenuAdmin();
	$menuadmin->setTitulo("Menu Admin 0 Usuarios");
	$menuadmin->setTemplate("adminusuarios");
	echo "Persistiendo MenuAdmin 0 ... ";
	$entityManager->persist($menuadmin);
	$entityManager->flush();
	$menuadmin = new \Entities\MenuAdmin();
	$menuadmin->setTitulo("Menu Admin 1 Grupos");
	$menuadmin->setTemplate("admingrupos");
	echo "Persistiendo MenuAdmin 1 ... ";
	$entityManager->persist($menuadmin);
	$entityManager->flush();
	$menuadmin = new \Entities\MenuAdmin();
	$menuadmin->setTitulo("Menu Admin 2 Roles");
	$menuadmin->setTemplate("adminroles");
	echo "Persistiendo MenuAdmin 2 ... ";
	$entityManager->persist($menuadmin);
	$entityManager->flush();
	
	$menuadmin = new \Entities\MenuAdmin();	
	$menuadmin->setTitulo("Menu Admin 3 Permisos");
	$menuadmin->setTemplate("adminpermisos");
	echo "Persistiendo MenuAdmin 3 ... ";
	$entityManager->persist($menuadmin);
	$entityManager->flush();
	}
	
?>