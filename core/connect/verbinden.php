<?php

	// Maken van verbinding

	$db = new PDO("mysql:host=localhost;dbname=website","root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
