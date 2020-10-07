<?php
require 'core/init.php';
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FG - Homepagina</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/jumbotron.css">
    <link rel="stylesheet" href="assets/css/modal.css">
    <link rel="stylesheet" href="assets/css/navigation-bar.css">
    <link rel="stylesheet" href="assets/css/progress-bar.css">
    <link rel="stylesheet" href="assets/css/projectlist.css">

</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand"><img class="logo" src="assets/img/florisgravendeellogo.png"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
    if (!empty($profile)){
        $profileinfo = $profile->profileinfo();
    }
    ?>
    <div class="jumbotron jumbotron-homepage">
        <div class="jumbotron-header">
            <h1 class="jumbotron-title" id="WelcomeText"><br></h1>
            <p id="introtext" class="text-left jumbotron-body"> <br></p><img class="profilepicture"
            src="assets/img/profile.jpg"><img class="thisisme" src="assets/img/ditbenik.png">

            <h5
                class="jumbotron-title2" style="font-size: 27px;">Mijn vaardigheden:</h5><div class="Block-langs">

                <script type="text/javascript">
                    var profileinfoQuery = <?php echo json_encode($profileinfo, JSON_PRETTY_PRINT) ?>;
                    var profielinformatie = profileinfoQuery[0]["profileinfo"];
                    document.getElementById("introtext").innerHTML = profielinformatie;
                </script>
    <div class="container">
        <div class="row">
            <div class="col-md-6 column-lang">
                <h1 class="languagetitle">JAVA</h1>
                <div class="progress languagebar">
                    <div class="progress-bar bg-info" id="progress-bar1" style="width:0%;"></div>
                </div>
            </div>
            <div class="col-md-6 column-lang">
                <h1 class="languagetitle">CSS3</h1>
                <div class="progress languagebar">
                    <div class="progress-bar bg-info" id="progress-bar2" style="width: 0%;"></div>
                </div>
            </div>
            <div class="col-md-6 column-lang">
                <h1 class="languagetitle">SQL</h1>
                <div class="progress languagebar">
                    <div class="progress-bar bg-info" id="progress-bar3" style="width: 0%;"></div>
                </div>
            </div>
            <div class="col-md-6 column-lang">
                <h1 class="languagetitle">PHP</h1>
                <div class="progress languagebar">
                    <div class="progress-bar bg-info" id="progress-bar4" style="width:0%;"></div>
                </div>
            </div>
            <div class="col-md-6 column-lang">
                <h1 class="languagetitle">HTML5</h1>
                <div class="progress languagebar">
                    <div class="progress-bar bg-info" id="progress-bar5" style="width:0%;"></div>
                </div>
            </div>
            <div class="col-md-6 column-lang">
                <h1 class="languagetitle">JAVASCRIPT</h1>
                <div class="progress languagebar">
                    <div class="progress-bar bg-info" id="progress-bar6" style="width:0%;"></div>
                </div>
            </div>
        </div>
    </div>
                <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
                <script type="text/javascript">
                    const typewriter1 = new Typewriter('#WelcomeText');

                    typewriter1.typeString('Welkom!')
                        .pauseFor(4500)
                        .changeCursor(' ')
                        .start();

                    for (let i=0; i<=500; i++) {
                        animate(i);
                    }
                    function animate(i) {
                        setTimeout(function() {
                            // Voeg taken toe!
                            setPercentageProgressBar("progress-bar1", getAnimateValue(i*i*0.90, 92));
                            setPercentageProgressBar("progress-bar2", getAnimateValue(i*i*0.25,35));
                            setPercentageProgressBar("progress-bar3", getAnimateValue(i*i*0.34,80));
                            setPercentageProgressBar("progress-bar4", getAnimateValue(i*i*0.24,20));
                            setPercentageProgressBar("progress-bar5", getAnimateValue(i*i*0.54,60));
                            setPercentageProgressBar("progress-bar6", getAnimateValue(i*i,42));

                        }, 100 * i);
                    }
                    function setPercentageProgressBar(id, width) {
                        for (let i = 0; i < width; i++){
                            document.getElementById(id).style.width = i + "%";
                        }
                    }
                    function getAnimateValue(currentValue, maxValue) {
                        if (currentValue >= maxValue) {
                            return maxValue;
                        } else if (currentValue < maxValue){
                            return currentValue;
                        }
                    }
                </script>
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
</body>

</html>