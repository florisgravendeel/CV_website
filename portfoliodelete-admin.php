<?php 
	require 'core/init.php';
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <title>Project verwijderen..</title>
</head>

<body>
    <?php
    // Check if we have parameters w1 and w2 being passed to the script through the URL
    if (isset($_GET["admin"]) && isset($_GET["projectid"])) {
      // Pak de 2 variabelen uit de url.
      $admin = $_GET["admin"];
      $projectid = $_GET["projectid"];
      echo $admin;
      echo $projectid;

      if (isset($project)) {
            $project->verwijder_project($projectid);
      }

      header('Location: portfolio-admin.php?admin=true');
    }
    ?>
</body>

</html>
