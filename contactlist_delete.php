<?php 
	require 'core/init.php';
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <title>Contact verwijderen..</title>
</head>

<body>
    <?php
    // Check if we have parameters w1 and w2 being passed to the script through the URL
    if (isset($_GET["admin"]) && isset($_GET["projectid"])) {
      // Pak de 2 variabelen uit de url.
      $name = $_GET["admin"];
      $projectid = $_GET["projectid"];
      echo $name;
      echo $projectid;

      if (isset($contact)) {
            $contact->verwijder_contact($projectid);
      }
     //Bericht wordt in de de databank gezet.
      header('Location: contactlist.php?admin=true');
    }
    ?>
</body>

</html>
