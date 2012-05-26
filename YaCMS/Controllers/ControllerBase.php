<?php

namespace YaCMS\Controllers {

	class ControllerBase {

		public $iweb;

		public function __construct($iweb) {
			$this -> $iweb = $iweb;
		}

	}

}
?>