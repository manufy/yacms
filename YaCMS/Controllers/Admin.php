<?php

namespace YaCMS\Controllers {

	class Admin {

		private $iweb;

		public function __construct($iweb) {
			$this -> iweb = $iweb;

			foreach (glob("Views/adminwidgets/*.php") as $filename) {
				include $filename;
			}
		}

		public function draw() {
			
			$parametro = 0;
			if (count($this -> iweb -> ouri -> parametros) > 1)
				$parametro = $this -> iweb -> ouri -> parametros[1];
			
			$this -> iweb -> HTMLTemplateOutput("admin/main", $parametro);
		}

	}

}
?>