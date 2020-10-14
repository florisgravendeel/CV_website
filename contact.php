<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FG - Contact</title>
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
        }
    }
    ?>
    <div class="jumbotron jumbotron-contact">
        <div class="jumbotron-header-contact">
            <form method="post">
                <h2 class="text-center" id="contactme">Contact</h2>
                <p class="contact-formholders">Naam:</p>
                <div class="form-group"><input class="form-control" type="text" id="form-name" name="name" placeholder="Voer hier uw naam in!"></div><small class="form-text text-danger" id="name-error-message">&nbsp;</small>
                <p id="formholder-email" class="contact-formholders">Email:</p>
                <div class="form-group"><input class="form-control" type="text" id="form-email" name="name" placeholder="Voer hier uw emailadres in!"></div><small class="form-text text-danger" id="email-error-message">&nbsp;</small>
                <p id="formholder-message" class="contact-formholders">Bericht:</p>
                <div class="form-group"><textarea class="form-control" id="form-message" name="message" placeholder="Typ hier je bericht!" rows="14"></textarea></div><small class="form-text text-danger" id="msg-error-message">&nbsp;</small>
                <div class="form-group"><button class="btn btn-primary" id="sendButton" type="button" onclick="processMessage()">VERZEND</button></div>
            </form>
        </div>
        <div class="jumbotron-contact-phone" style="height: 45px;">
            <h2 class="text-center" id="email-p">Ik ben ook bereikbaar tijdens werkdagen op: <em>06 11 10 11 77.</em><br></h2>
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
    <script src="assets/js/login.js" type="text/javascript"></script>
    <script src="assets/js/contact.js" type="text/javascript"></script>
</body>
</html>