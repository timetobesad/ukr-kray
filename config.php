<?php

	date_default_timezone_set('UTC');

	$adminKey = '12345678';
	
	if(isset($_COOKIE['phpsessid']))
		session_id($_COOKIE['phpsessid']);
	else
		setcookie('phpsessid', session_id(), 604800);
	
	session_start();

	include_once('class/db.class.php');
	
	$db = new DB(array('login' => 'krayh144_db', 'pass' => '6rCtx9Tk',
						'host' => 'krayh144.mysql.tools', 'name' => 'krayh144_db'));
	$db->connect();
	
	if(!$db->isConnected)
		die('<b><h3 style=\'color:red\'>Error connected to database</h3></b>');
	

?>