<?php
namespace YaCMS\Core {
	
	class SessionManager {
	  function __construct() {
	  	
		
		
	     session_start ();
	  }
	  public function set($nombre, $valor) {
	     $_SESSION [$nombre] = $valor;
	  }
	  public function get($nombre) {
	     if (isset ( $_SESSION [$nombre] )) {
	        return $_SESSION [$nombre];
	     } else {
	         return false;
	     }
	  }
	  public function delete($nombre) {
	      unset ( $_SESSION [$nombre] );
	  }
	  public function endsession() {
	      $_SESSION = array();
	      session_destroy ();
	  }
	  
	   public function startsession() {
	      $_SESSION = array();
	      session_start ();
	  }
	}
}
?>