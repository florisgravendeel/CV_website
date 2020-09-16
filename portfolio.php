<?php
require 'core/init.php';
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Portfolio</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/ProjectList.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="text-white-50">
    <nav class="navbar navbar-light navbar-expand-md" id="navbar">
        <div class="container-fluid"><a class="navbar-brand" href="#"><img id="logo" src="assets/img/florisgravendeellogo.png"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1" style="height: 33px;text-align: left;">
                <ul class="nav navbar-nav mx-auto" id="navbarmenu">
                    <li class="nav-item"><a class="nav-link active" id="navmenubar1" href="index.php">Homepagina</a></li>
                    <li class="nav-item"><a class="nav-link active" id="navmenubar1" href="portfolio.php">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link active" id="navmenubar1" href="#">Blog</a></li>
                    <li class="nav-item"><a class="nav-link active" id="navmenubar1" href="contact.php">Contact</a></li>
                </ul>
        </div>
        </div>
    </nav>
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
    <div id="heading"></div>
    <div class="jumbotron" id="jumbotron2">
        <div class="container">
            <div id="heading" class="heading">
                <h2>Portfolio</h2>
            </div>
            <div class="row" id="projectsContainer">
                <script> //Alle data van PHP naar Javascript omzetten.
                    var aantalProjecten = <?php echo json_encode($aantal_projecten); ?>;

                    var titel = <?php echo json_encode($titel); ?>;
                    var kort_beschrijving = <?php echo json_encode($kort_beschrijving); ?>;
                    var lang_beschrijving = <?php echo json_encode($lang_beschrijving); ?>;
                    var datum = <?php echo json_encode($datum); ?>;

                    var afbeelding = <?php echo json_encode($afbeelding); ?>;
                    var programmeertaal = <?php echo json_encode($programmeertaal); ?>;
                    var link = <?php echo json_encode($link); ?>;

                    var projecten = [];
                    for (i = 0; i < (aantalProjecten); i++){
                        var date = new Date(datum[i]);
                        var project = {
                            titel: titel[i],
                            korte_beschrijving: kort_beschrijving[i],
                            lange_beschrijving: lang_beschrijving[i],
                            datum: date.getDate() + "/" + (date.getMonth()+1) + "/" + date.getFullYear(),
                            afbeelding: afbeelding[i],
                            programeertaal: programmeertaal[i],
                            link: link[i]
                        };
                        projecten.push(project);
                    }
                    function bouwProjectLijst() {
                        // We hebben een plek nodig om alle HTML output in op te slaan
                        const output = [];
                        // Voor elk project: ->
                        projecten.forEach((huidigProject, projectNummer) => {
                            // Voeg het project toe aan de output:
                            output.push(
                                `
						<div class="col-md-6 col-lg-4">
                            <div id="card-body${projectNummer}" class="card-body">
                            <h1 class="card-title">${huidigProject.titel}</h1>
                            <p class="card-date">${huidigProject.datum}</p>
                            <p class="card-description">${huidigProject.korte_beschrijving}<br></p>
                            <button class="btn btn-primary card-button" type="button" onclick="window.location.href='${huidigProject.link}';">MEER INFO</button>
                            <p class="card-madewith">${huidigProject.programeertaal}</p>
                            </div>
                        </div>
                                `
                            );
                        });
                        // Combineer de output in 1 string van HTML en laat het zien op de pagina
                        projectContainer.innerHTML = output.join("");
                    }
                    // Voegt afbeeldingen toe aan de projecten.
                    function styleProjectLijst() {
                        for (i = 0; i < aantalProjecten; i++) {
                            var id = "card-body" + i;
                            var background = "url(assets/img/" + projecten[i].afbeelding + ")";
                            document.getElementById(id).style.backgroundImage = background;
                        }
                    }
                    const projectContainer = document.getElementById("projectsContainer");
                    bouwProjectLijst();
                    styleProjectLijst();
                        /**Gezien het aantal projecten kan verschillen, moet je rekening houden met de hoogte van de pagina.
                        if (aantalProjecten <= 3) {
                            var media_query1 = 'screen and (min-width:992px) and (max-width:1199.98px)';
                            //event to watch the media query
                            window.matchMedia(media_query1).addEventListener('change', function() {
                                let matched = this.matches;
                                if(matched) {
                                    document.getElementById("jumbotron2").style.height = "900px";
                                }
                            });
                            var media_query = 'screen and (min-width: 1200px)';
                            // event to watch the media query
                            window.matchMedia(media_query).addEventListener('change', function() {
                                let matched = this.matches;
                                if(matched) {
                                    document.getElementById("jumbotron2").style.height = "1100px";
                                }
                            });
                <div class="col-md-6 col-lg-4">
                    <div class="card-body" id="fake-card1">
                        <h1 class="card-title">Weekend Miljonairs!<br></h1>
                        <p class="card-date">18/06/2019</p>
                        <p class="card-description">Test je kennis met deze leuke quiz!<br></p><button class="btn btn-primary card-button" type="button">MEER INFO</button>
                        <p class="card-madewith">PHP</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card-body">
                        <h1 class="card-title">Iceball<br></h1>
                        <p class="card-date">21/06/2020</p>
                        <p class="card-description">Een geavanceerde spigot-plugin voor Minecraft.<br></p><button class="btn btn-primary card-button" type="button">MEER INFO</button>
                        <p class="card-madewith">JAVA</p>
                    </div>
                </div>
                        }*/
                </script>
            </div>
        </div>
    </div>
    <div id="footer" class="footer-basic">
        <footer>
            <div class="social"><a id="githubicon" href="https://github.com/florisgravendeel/"><i class="icon ion-social-github"></i></a><a id="facebookicon" href="https://facebook.com/florisgravendeel"><i class="icon ion-social-facebook"></i></a><a href="https://www.instagram.com/floris.gravendeel/"><i class="icon ion-social-instagram"></i></a></div>
            <p
                id="copyrightp" class="copyright">Floris Gravendeel © 2020</p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>