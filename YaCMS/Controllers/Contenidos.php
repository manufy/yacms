<?php

namespace YaCMS\Controllers {

	class Contenidos {

		private $iweb;

		public function __construct($iweb) {
			$this -> iweb = $iweb;

			foreach (glob("Views/widgets/menuvertical/*.php") as $filename) {
				include $filename;
			}
			foreach (glob("Views/widgets/*.php") as $filename) {
				include $filename;
			}
			foreach (glob("Views/widgets/contenido/*.php") as $filename) {
				include $filename;
			}

		}

		public function draw() {
			$this -> iweb -> HTMLTemplateOutput("default/main", $this -> iweb -> ouri -> parametros[1]);
		}

	}

}
?>