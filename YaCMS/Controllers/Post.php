<?php

namespace YaCMS\Controllers {

	class Post {

		private $iweb;

		public function __construct($iweb) {
			$this -> iweb = $iweb;
		}

		public function draw() {

			//echo "postprocessordddddddddddd";

		//	echo $this -> iweb -> ouri -> ParametrosArray[count($this -> iweb -> ouri -> ParametrosArray) - 1];
			//$this->iweb->HTMLTemplateOutput("widgets/login/login",0);

			include ("/Views/widgets/usuarios/loginpost.php");

		}

	}

}
?>