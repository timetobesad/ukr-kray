<?php

	include_once('../config.php');
	include_once('../class/cat.class.php');
	
	$catt = new CatDish($db);
	
	echo '<pre>';
	print_r($catt->getCatts());

?>