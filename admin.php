<?php

	include_once('config.php');
	
	if(!isset($_SESSION['admin-access']))
	{
		include_once('view/admin/login.php');
		die();
	}
	
	include_once('view/admin/index.php');

?>