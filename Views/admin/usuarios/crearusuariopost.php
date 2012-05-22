<?php

echo "Creando Usuario ... ";
$user = new \Entities\Usuario();
$user->setNombre("yo");
$user->setPassword("demo");
echo "Persistiendo Usuario ... ";
$iweb->entitymanager->persist($user);
$iweb->entitymanager->flush();
?>