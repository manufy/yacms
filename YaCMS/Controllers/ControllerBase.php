<?php

namespace YaCMS\Controllers {

	class ControllerBase {

		private $iweb;

		public function __construct($iweb) {
			$this -> $iweb = $iweb;
		}

	}

}
?>