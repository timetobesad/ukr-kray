<?php

	include_once('../config.php');
	
	if(!isset($_SESSION['admin-access']))
	{
		header('Location: /');
		die();
	}
	
	include_once('../class/cat.class.php');

	include_once('../view/admin/dish.php');
	
	
	
?>