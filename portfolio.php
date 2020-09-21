<?php
require 'core/init.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FG - Portfolio</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/jumbotron.css">
    <link rel="stylesheet" href="assets/css/navigation-bar.css">
    <link rel="stylesheet" href="assets/css/projectlist.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand" href="#"><img class="logo" src="assets/img/florisgravendeellogo.png"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1" style="height: 33px;text-align: left;">
                <ul class="nav navbar-nav mx-auto navigation-bar">
                    <li class="nav-item"><a class="nav-link active navigation-links" href="index.php">Homepagina</a></li>
                    <li class="nav-item"><a class="nav-link active navigation-links" href="portfolio.php">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link active navigation-links" href="#">Blog</a></li>
                    <li class="nav-item"><a class="nav-link active navigation-links" href="contact.php">Contact</a></li>
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
    <div class="jumbotron jumbotron-portfolio">
        <div class="container">
            <div class="portfolio-title">
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
                </script>
            </div>
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
</body>

</html>