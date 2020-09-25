<?php 
	require 'core/init.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/quizstyle.css"/>
    <title>Score opsturen..</title>
</head>

<body>
    <?php

    // Check if we have parameters w1 and w2 being passed to the script through the URL
    if (isset($_GET["w1"]) && isset($_GET["w2"])) {
      // Pak de 2 variabelen uit de url.
      $nickname = $_GET["w1"];  
      $score = $_GET["w2"];
        
      //Pak het totaal aantal scoreboard ids.
      $totalids = $scoreboard->scoreboard_aantal();  

      //Het nieuwe id voor de score die erin gezet gaat worden.    
      $id = $totalids + 1; 
      $scoreboard->toevoegen_score($id,$nickname,$score); //Score wordt in de de databank gezet.
      header('Location: scoreboard.php');
    }
    ?>
</body>

</html>
