<?php

//nclude ( LIB_DIR ."/rain.tpl.class.php");

function iweb_admingetcontenido($iweb=null, $contenidoid=null) {
	//  $contenidoid = $iweb->var['contenidoid'];
	  $templateengine = $iweb->TemplateEngineFactory("Views/");
	  $admincontenidoid= substr($contenidoid, 0, strrpos($contenidoid, '.tpl'));


		echo "conteniood: " . $contenidoid;
	  if ($contenidoid == ""){
	 	
		echo "Admincontent.tpl";
		return;
	  }
	  
	
	  if (file_exists("Views/admin/usuarios/". $contenidoid )) {
	  
	  		include "Views/admin/usuarios/".$contenidoid;
		  return;	
		
	  }
	  
	  switch ($contenidoid){
	  	
	  	case "adminusuarios": $html2 =$templateengine->draw("adminwidgets/adminusuarios",$return_string = true); 
		  					  echo $html2;	
		  					  break;
		case "admingrupos": $html2 =$templateengine->draw("adminwidgets/admingrupos",$return_string = true); 
		  					  echo $html2;	
		  					  break;
		case "crearusuario": $html2 =$templateengine->draw("admin/usuarios/crearusuario",$return_string = true); 
		  					  echo $html2;	
		  					  break;
		case "crearusuariopost.php": $html2 =$templateengine->draw("admin/usuarios/crearusuariopost",$return_string = true); 
		  					  echo $html2;	
		  					  break;
		 default: echo $contenidoid;
	  }
	  //var_dump($iweb);
	//echo "contenidoid=";
	///var_dump($contenidoid);
}
?>