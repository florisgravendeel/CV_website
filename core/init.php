<?php 
	require 'core/connect/verbinden.php';
	require 'classes/project_class.php';

	if (!empty($db)) {
		$project = new Project($db);
	}
	
	$errors = array();
?>
