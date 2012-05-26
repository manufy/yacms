<?php

namespace YaCMS\Controllers {

	class Index extends ControllerBase {

		public function __construct($iweb) {
			$this -> iweb = $iweb;
			//parent::__construct($iweb);
		//	echo "consmenuvertical<br>";
			foreach (glob("Views/widgets/menuvertical/*.php") as $filename) {
				include $filename;
			}
//echo "consmenuviews<br>";
			foreach (glob("Views/widgets/*.php") as $filename) {
				include $filename;
			}
//echo "conscontenido<br>";
			foreach (glob("Views/widgets/contenido/*.php") as $filename) {
				include $filename;
			}
		//	echo "consok";

		}

		public function draw() {
			$this -> iweb -> HTMLTemplateOutput("default/main", 0);
		}

	}

}
?>