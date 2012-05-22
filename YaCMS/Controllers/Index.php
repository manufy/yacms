<?php

namespace YaCMS\Controllers {

	class Index extends ControllerBase {

		public function __construct($iweb) {
			$this -> iweb = $iweb;
			//parent::__construct($this->iweb);
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
			$this -> iweb -> HTMLTemplateOutput("default/main", 0);
		}

	}

}
?>