<?php

	include_once('../config.php');
	
	if(!isset($_POST['key']) || empty($_POST['key']) || isset($_SESSION['admin-access']))
	{
		die('<h2>Помилка. Доступ заборонений.</h2>');
	}
	
	$response = 'denied';
	
	if($_POST['key'] == $adminKey)
	{
		$_SESSION['admin-access'] = true;
		$response = 'open';
	}
	
	echo $response;

?>