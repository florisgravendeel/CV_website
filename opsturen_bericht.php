<?php 
	require 'core/init.php';
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <title>Bericht sturen..</title>
</head>

<body>
    <?php
    // Check if we have parameters w1 and w2 being passed to the script through the URL
    if (isset($_GET["w1"]) && isset($_GET["w2"]) && isset($_GET["w3"])) {
      // Pak de 2 variabelen uit de url.
      $name = $_GET["w1"];
      $email = $_GET["w2"];
      $msg = $_GET["w3"];

        if (isset($contact)) {
            $contact->toevoegen_contact($name, $email, $msg);
        }
     //Bericht wordt in de de databank gezet.
      header('Location: contact.php');
    }
    ?>
</body>

</html>
