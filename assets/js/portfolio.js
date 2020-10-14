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
                            <button class="btn btn-primary card-button" type="button" data-toggle="modal" data-target="#projectModal" onclick="configureModal(${projectNummer})">MEER INFO</button>
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
function configureModal(projectNumber) {
    document.getElementById("projectModalLabel").innerHTML = projecten[projectNumber].titel;
    document.getElementById("modal-body-text").innerHTML = projecten[projectNumber].lange_beschrijving;
    document.getElementById("btn-modal").onclick = function() {
        window.open(projecten[projectNumber].link);
    };
}
const projectContainer = document.getElementById("projectsContainer");
bouwProjectLijst();
styleProjectLijst();