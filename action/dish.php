<?php

	include_once('../config.php');
	
	if(!isset($_SESSION['admin-access']) || !isset($_POST['action']))
	{
		header('Location: /');
		die();
	}
	
	include_once('../class/dish.class.php');

?>