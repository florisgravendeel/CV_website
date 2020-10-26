<?php
require 'core/init.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Floris CV Website</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/admintool.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/contactlist.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/jumbotron.css">
    <link rel="stylesheet" href="assets/css/login-screen.css">
    <link rel="stylesheet" href="assets/css/modal.css">
    <link rel="stylesheet" href="assets/css/navigation-bar.css">
    <link rel="stylesheet" href="assets/css/portfolio-edit.css">
    <link rel="stylesheet" href="assets/css/progress-bar.css">
    <link rel="stylesheet" href="assets/css/projectlist.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand"><img id="logoLink" class="logo" src="assets/img/florisgravendeellogo.png"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1" style="height: 33px;text-align: left;">
                <ul class="nav navbar-nav mx-auto navigation-bar">
                    <li class="nav-item"><a class="nav-link active navigation-links" href="index.php">Homepagina</a></li>
                    <li class="nav-item"><a class="nav-link active navigation-links" href="portfolio.php">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link active navigation-links" target="_blank" href="pdfview.php?file=CV.pdf">CV</a></li>
                    <li class="nav-item"><a class="nav-link active navigation-links" href="contact.php">Contact</a></li>
                </ul>
        </div>
        </div>
    </nav>
<?php
if (isset($_GET["admin"])) {
    // Pak de variabel uit de url.
    $bool = $_GET["admin"];
    $string = strval($bool);
    if ($string == "true"){
        include "admintoolbar.php";
    } else {
        header("Location: login.php");
    }
}
?>
    <div class="jumbotron jumbotron-contactlist">
        <h1 id="contactlist-heading">Contacten</h1>
        <div class="jumbotron-header-contactlist"><div>
<table id="contaclist-table">
   <thead>
      <tr>
         <th class="contactlist-thsort" id="contactlist-thname">Naam:</th>
         <th class="contactlist-thsort" id="contactlist-themail">Email:</th>
         <th class="contactlist-thsort" id="contactlist-thdate">Datum:</th>
         <th class="contactlist-thsort" id="contactlist-thmessage">Bericht:</th>
      </tr>
   </thead>
   <tbody>
      <?php
      if (!empty($contact))
          $contactenlijst = $contact->overzicht_berichten();
      foreach ($contactenlijst as $rij) {
                $date = date_create($rij['date']);
                $parsedDate = strval(date_format($date,"d/m/Y"));
          echo '<tr>';
          echo '
                <td class="contactlist-tdname">'.$rij['name'].'</td>
				<td class="contactlist-tdemail">'.$rij['email'].'</td>
				<td class="contactlist-tddate">'.$parsedDate.'</td>
				<td class="contactlist-tdmessage">'.$rij['message'].'</td>
				<td hidden class="contactlist-tdid">'.$rij['id'].'</td>
				';
          echo '</tr>';
      }
      ?>
   </tbody>
</table>
</div></div>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a id="githubicon" href="https://github.com/florisgravendeel/"><i class="icon ion-social-github"></i></a><a id="facebookicon" href="https://facebook.com/florisgravendeel"><i class="icon ion-social-facebook"></i></a><a id="instagramicon" href="https://www.instagram.com/floris.gravendeel/"><i class="icon ion-social-instagram"></i></a></div>
            <p
                class="copyright">Floris Gravendeel © 2020</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/--mp--Animated-progress-bar-in-viewport-1.js"></script>
    <script src="assets/js/--mp--Animated-progress-bar-in-viewport.js"></script>
    <script src="assets/js/contactlist.js" type="text/javascript"></script>
    <script src="assets/js/login.js" type="text/javascript"></script>
</body>

</html>