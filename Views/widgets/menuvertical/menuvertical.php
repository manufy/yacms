<?php
use IWeb\Core;
use Doctrine\ORM\Query;

function widget_menuvertical($baseurl) {

	global $YaCMS;
	$output = "";
	$htmlhelper = new YaCMS\Core\HTMLHelper();
	$dql = "SELECT e FROM \Entities\Estructura e";
	$query = $YaCMS -> entitymanager -> createQuery($dql);
	//$query = $em->createQuery($dql);
	$estructuras = $query -> getResult();
	$output .= $htmlhelper -> ul("menu");
	foreach ($estructuras as $estructura) {
		//	$output .= $htmlhelper->li($htmlhelper->a('/IWeb3/contenidos/' . $estructura->getId(), $estructura->getId())); //)$estructura->getId()); //<a href="/IWeb3/contenidos/' . $estructura->getId() . $estructura->getId() .'</a>' );
		$output .= $htmlhelper -> li($htmlhelper -> a($baseurl . 'contenidos/' . $estructura -> getId(), $estructura -> getTitulo()));
		//)$estructura->getId()); //<a href="/IWeb3/contenidos/' . $estructura->getId() . $estructura->getId() .'</a>' );
	}
	return $output;
}
?>