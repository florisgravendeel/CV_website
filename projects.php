<?php 
	require 'core/init.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Floris' projecten</title>
    <meta charset="utf-8">
</head>
<body>

<h1>Projects</h1>
<p>Dit zijn al mijn projecten.</p>
    <ol><li><a href="projects.php">Projects</a></li>
        <li><a href="aboutme.php">Over Mij</a>
    <li>Contact</li>
    </ol>
    <div id="projectlijst"></div>

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
    foreach($projecten as $project){
        array_push($titel,$project['title']);
        array_push($kort_beschrijving,$project['short_description']);
        array_push($lang_beschrijving,$project['long_description']);
        array_push($datum,$project['date']);
        array_push($afbeelding,$project['img']);
    }
    ?>
    <script> //Alle data van PHP naar Javascript omzetten.
    var aantalProjecten = <?php echo json_encode($aantal_projecten); ?>;

    var titel = <?php echo json_encode($titel); ?>;
    var kort_beschrijving = <?php echo json_encode($kort_beschrijving); ?>;
    var lang_beschrijving = <?php echo json_encode($lang_beschrijving); ?>;
    var datum = <?php echo json_encode($datum); ?>;
    var afbeelding = <?php echo json_encode($afbeelding); ?>

    var projecten = [];
    for (i = 0; i < (aantalProjecten); i++){
            var project = {
            titel: titel[i],
            korte_beschrijving: kort_beschrijving[i],
            lange_beschrijving: lang_beschrijving[i],
            datum: datum[i],
            afbeelding: afbeelding[i]
        };
        projecten.push(project);

    }

            function bouwProjectLijst() {
                // We hebben een plek nodig om alle HTML output in op te slaan
                const output = [];

                // Voor elke vraag
                projecten.forEach((huidigProject, projectNummer) => {
                   
                    // Voeg de vraag met de antwoorden toe aan de output.
                    output.push(
                        `
						
						<div class="slide">
							<div class="project"> ${huidigProject.titel} </div>
                            <p>${huidigProject.korte_beschrijving}</p>
							<p>${huidigProject.lange_beschrijving}</p>
                            <p>${huidigProject.datum}</p>
						</div>`
                    );
                });
                // Combineer de output in 1 string van HTML en laat het zien op de pagina
                projectContainer.innerHTML = output.join("");
            }
            
            const projectContainer = document.getElementById("projectlijst");
            bouwProjectLijst();
    </script>
</body>
</html>