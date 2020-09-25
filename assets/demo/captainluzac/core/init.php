<?php 
	require 'connect/verbinden.php';
	require 'classes/quiz_class.php';
	require 'classes/scoreboard_class.php';


if (!empty($db)){
	$quiz = new Quiz($db);
 	$scoreboard = new Scoreboard($db);
}
	$errors = array();
?>
