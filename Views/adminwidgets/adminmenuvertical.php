<?php
use IWeb\Core; 

function widget_adminmenuvertical($baseurl) {

global $iweb;
$output = "";
$htmlhelper = new IWeb\Core\HTMLHelper();
$dql = "SELECT a FROM \Entities\MenuAdmin a";
$query = $iweb->entitymanager->createQuery($dql);
$menu = $query->getResult();
$output .= $htmlhelper->ul("menu");
foreach ($menu as $item)
	{	
	//	$output .= $htmlhelper->li($htmlhelper->a('/IWeb3/contenidos/' . $estructura->getId(), $estructura->getId())); //)$estructura->getId()); //<a href="/IWeb3/contenidos/' . $estructura->getId() . $estructura->getId() .'</a>' );	
		$output .= $htmlhelper->li($htmlhelper->a($baseurl . 'admin/' . $item->getTemplate(), $item->getId() . $item->getTitulo() ." "  . $item->getTemplate())); //)$estructura->getId()); //<a href="/IWeb3/contenidos/' . $estructura->getId() . $estructura->getId() .'</a>' );	
	}
echo $output;
}
?>