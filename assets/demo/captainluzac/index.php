<?php 
	require 'core/init.php';
?>

<!DOCTYPE html>
<html lang="nl">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>captainluzac</title>  
  </head>

  <body>	
    <div id="container">
      <img class="center" src="images/quiz-1024x682.jpg" width=300/>
      <?php
      echo '<div>';
      include 'includes/menu.php';
      echo '</div>';
      echo '<ul>';
      echo '<li>';
      echo '</li>';
      echo '</ul>';
      header('Location: scoreboard.php');
      ?>
    </div>
  </body>
</html>