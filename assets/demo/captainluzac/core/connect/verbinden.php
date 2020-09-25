<?php

	// Maken van verbinding
	$host = 'florisg-website.mysql.database.azure.com';
	$username = 'florisgravendeel@florisg-website';
	$password = 'uVLg+X4%@zD2VpU,';
	$db_name = 'website';

	try {
		$db = new PDO("mysql:charset=utf8mb4;host=$host;dbname=$db_name", "$username", "$password");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
?>
