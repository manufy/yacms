<?php

	require 'vendor/.composer/autoload.php';
	$YaCMS = new YaCMS\Core\Main("http://127.0.0.1/yacms/");
	$YaCMS -> route();

?>