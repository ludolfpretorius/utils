<?php
	require 'config.php';
	
	$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
	$pdo = '';

	try {
		$pdo = new PDO($dsn, DB_USER, DB_PASS);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		exit('Error: 900');
	}

	return $pdo;