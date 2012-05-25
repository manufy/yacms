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
			$this -> iweb -> HTMLTemplateOutput("admin/main", $this -> iweb -> ouri -> parametro);
		}

	}

}
?>