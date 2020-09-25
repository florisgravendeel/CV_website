<?php 
	require 'core/connect/verbinden.php';
	require 'classes/project_class.php';
	require 'classes/contact_class.php';
	require 'classes/profile_class.php';

	if (!empty($db)) {
		$project = new Project($db);
		$contact = new Contact($db);
		$profile = new Profile($db);
	}
	
	$errors = array();
?>
