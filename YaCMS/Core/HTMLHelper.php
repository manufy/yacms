<?php

namespace YaCMS\Core {

	class HTMLHelper {

		const HTML_BR = '<br>';

		public function br($num = 1) {
			$output = '';
			for ($i = 0; $i < $num; $i++)

				$output .= iwebHTMLHelper::HTML_BR;
			return $output;
		}

		public function h($level = 1, $texto) {
			$output = '<h' . $level . '>' . $texto . '</h>';
			return $output;
		}

		public function a($url, $textohtml) {
			$output = '<a href="' . $url . '">' . $textohtml . '</a>';
			return $output;
		}

		public function ul($text) {
			$output = '<ul>' . $text . '</ul>';
			return $output;
		}

		public function li($text) {
			$output = '<li>' . $text . '</li>';
			return $output;
		}

	}

}
?>