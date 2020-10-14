<?php 
	require 'core/init.php';
?>

<!DOCTYPE html>
<html lang="nl">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>captainluzac</title>  
  </head>

  <body>	
    <div id="container">
      <table>
          <thead>
            <tr>
              <th>Naam:</th>
              <th>Email</th>
			  <th>Datum:</th>
              <th>Bericht:</th>
            </tr>
          </thead>

          <tbody>
            <?php
            if (!empty($contact))
            $contactenlijst = $contact->overzicht_berichten();
            foreach ($contactenlijst as $rij) {
              echo '<tr>';
              echo '
                <td class="contactlist-tdname">'.$rij['name'].'</td>
				<td class="contactlist-tdemail">'.$rij['email'].'</td>
				<td class="contactlist-tddate">'.$rij['date'].'</td>
				<td class="contactlist-tdmessage">'.$rij['message'].'</td>
				';
              echo '</tr>';
            }
            ?>
          </tbody>
      </table>
    </div>
  </body>
</html>
<!--
if (!empty($contact))
            $contactenlijst = $contact->overzicht_berichten();
            foreach ($contactenlijst as $rij) {
              echo '<tr>';
              echo '
                <td class="contactlist-tdname">'.$rij['name'].'</td>
				<td class="contactlist-tdemail">'.$rij['email'].'</td>
				<td class="contactlist-tddate">'.$rij['date'].'</td>
				<td class="contactlist-tdmessage">'.$rij['message'].'</td>
				';
              echo '</tr>';
            }












Belangrijk! Splist de email/bericht in 2 delen met een spatie er tussen. Pak het midden van de email en voeg " " toe.

<table>
   <thead>
      <tr>
         <th class="contactlist-thsort" id="contactlist-thname">Naam:</th>
         <th class="contactlist-thsort" id="contactlist-themail">Email</th>
         <th class="contactlist-thsort" id="contactlist-thdate">Datum:</th>
         <th class="contactlist-thsort" id="contactlist-thmessage">Bericht:</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td class="contactlist-tdname">Sam Oosterhuis</td>
         <td class="contactlist-tdemail">sam@smail.nl</td>
         <td class="contactlist-tddate">2020-09-21</td>
         <td class="contactlist-tdmessage">Test  1 2 3</td>
      </tr>
      <tr>
         <td class="contactlist-tdname">Emma H.</td>
         <td class="contactlist-tdemail">emma@aml.com</td>
         <td class="contactlist-tddate">2020-09-24</td>
         <td class="contactlist-tdmessage">aaa</td>
      </tr>
      <tr>
         <td class="contactlist-tdname">Karel S.</td>
         <td class="contactlist-tdemail">karel@kutmail.nl</td>
         <td class="contactlist-tddate">2020-10-07</td>
         <td class="contactlist-tdmessage">Hoi, ik zag je bericht. Hier is mijn email: neem contact op.</td>
      </tr>
      <tr>
         <td class="contactlist-tdname">A.</td>
         <td class="contactlist-tdemail">asm@tmail.com</td>
         <td class="contactlist-tddate">2020-10-07</td>
         <td class="contactlist-tdmessage">Floris, mooie site.</td>
      </tr>
      <tr>
         <td class="contactlist-tdname">Kees Kaas</td>
         <td class="contactlist-tdemail">kees@kaas.nl</td>
         <td class="contactlist-tddate">2020-10-07</td>
         <td class="contactlist-tdmessage">Lorem ipsum dolor sit amet, consectetur adipiscing elit ..!</td>
      </tr>
   </tbody>
</table>
-->