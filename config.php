<?php

	date_default_timezone_set('UTC');

	$adminKey = '1';
	
	if(isset($_COOKIE['phpsessid']))
		session_id($_COOKIE['phpsessid']);
	else
		setcookie('phpsessid', session_id(), 604800);
	
	session_start();

	include_once('class/db.class.php');
	
	$db = new DB(array('login' => 'root', 'pass' => '',
						'host' => '127.0.0.1', 'name' => 'krayh144_db'));
	$db->connect();
	
	if(!$db->isConnected)
		die('<b><h3 style=\'color:red\'>Error connected to database</h3></b>');
	

?>