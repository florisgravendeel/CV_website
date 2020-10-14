<?php
require 'core/init.php';
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FG - Portfolio</title>
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
    <div class="jumbotron jumbotron-portfolio">
        <div class="container">
            <div class="portfolio-title">
                <h2>Portfolio</h2>
            </div>
            <div class="row" id="projectsContainer">
                    <!--- In deze div komen alle projecten -->
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
<!-- Modal -->
    <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectModalLabel">Iceball</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="modal-body-text"> </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">SLUIT</button>
                        <button type="button" class="btn btn-primary" id="btn-modal">BEKIJK</button>
                    </div>
                </div>
            </div>
        </div>
    <?php // Download de projecten van de database

    if (!empty($project)) {
        $projecten = $project->overzicht_projecten();
        $aantal_projecten = $project->aantal_projecten();
    }

    $titel = array();
    $kort_beschrijving = array();
    $lang_beschrijving = array();
    $datum = array();
    $afbeelding = array();
    $programmeertaal = array();
    $link = array();
    foreach($projecten as $project){
        array_push($titel,$project['title']);
        array_push($kort_beschrijving,$project['short_description']);
        array_push($lang_beschrijving,$project['long_description']);
        array_push($datum,$project['date']);
        array_push($afbeelding,$project['img']);
        array_push($programmeertaal,$project['madewith']);
        array_push($link,$project['link']);
    }
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/--mp--Animated-progress-bar-in-viewport-1.js"></script>
    <script src="assets/js/--mp--Animated-progress-bar-in-viewport.js"></script>
    <script> //Alle data van PHP naar Javascript omzetten.
        var aantalProjecten = <?php echo json_encode($aantal_projecten); ?>;
        var titel = <?php echo json_encode($titel); ?>;
        var kort_beschrijving = <?php echo json_encode($kort_beschrijving); ?>;
        var lang_beschrijving = <?php echo json_encode($lang_beschrijving); ?>;
        var datum = <?php echo json_encode($datum); ?>;
        var afbeelding = <?php echo json_encode($afbeelding); ?>;
        var programmeertaal = <?php echo json_encode($programmeertaal); ?>;
        var link = <?php echo json_encode($link); ?>;
    </script>
    <script src="assets/js/login.js" type="text/javascript"></script>
    <script src="assets/js/portfolio.js" type="text/javascript"></script>
</body>

</html>