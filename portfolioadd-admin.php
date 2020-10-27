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
        if ($string == "true") {
            include "admintoolbar.php";
            echo '<script src="assets/js/admintoolbar.js" type="text/javaScript"></script>';
        } else {
            header("Location: login.php");
        }
    }
    ?>
    <div class="jumbotron jumbotron-contactlist">
        <h1 id="addportfolio-heading">Project toevoegen</h1>
        <div hidden id="projectAlertBlue" class="alert alert-primary alert-dismissible fade show" role="alert">
            Je project <strong>Iceball</strong> is bijgewerkt!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        <div class="jumbotron-header-addportfolio"><div id="portfolio-add">
<form>
  <div class="form-group">
    <label for="formUploadProject1">Projectnaam:</label>
    <input type="text" class="form-control is-valid" id="formUploadProject1" placeholder="Voer hier de naam van het project in!">
  </div>
  <div class="form-group">
    <label for="formUploadProject2">Projectbeschrijving (kort):</label>
    <input type="text" class="form-control is-invalid" id="formUploadProject2" placeholder="Beschrijf hier in het kort je project!">
  </div>
  <div class="form-group">
    <label for="formUploadProject3">Projectbeschrijving (lang):</label>
    <textarea type="text" class="form-control" id="formUploadProject3" placeholder="Beschrijf hier uitgebreid je project!"></textarea>
  </div>
  <div>    
      <label class="form-group" for="formUploadProject4">Project datum:</label>
      <input type="date" id="formUploadProject4">
  </div>  
  <div class="form-group">
    <label for="formUploadProject5">Programmertaal:</label>
    <input type="text" class="form-control" id="formUploadProject5" placeholder="Met welke programmertaal is je project gemaakt?">
  </div>
  <div class="form-group">
    <label for="formUploadProject6">Projectlink:</label>
    <input type="url" class="form-control" id="formUploadProject6" placeholder="Link naar je project! Voorbeeld: https://github.com/steve/project1">
  </div>
  <div>
    <label class="form-group" for="formUploadProject7">Logo:</label>
    <div class="custom-file"> 
    <input type="file" class="custom-file-input" id="formUploadProject8" required>
    <label class="custom-file-label" for="formUploadProject8">Upload het logo van je project!</label>
    </div>
  </div>
</form>
    <button class="btn btn-primary" id="sendButton2" type="submit">VERZEND</button>
</div>
</div>
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
    <script src="assets/js/portfolio-add-admin.js"></script>
    <script src="assets/js/login.js" type="text/javascript"></script>
</body>

</html>