var projecten = [];
for (i = 0; i < (aantalProjecten); i++){
    var date = new Date(datum[i]);
    var project = {
        titel: titel[i],
        korte_beschrijving: kort_beschrijving[i],
        datum: date.getDate() + "/" + (date.getMonth()+1) + "/" + date.getFullYear(),
        afbeelding: afbeelding[i],
        id: id[i]
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
                            <img class="card-edit-icon" src="assets/img/edit-icon.png">
                            <img class="card-delete-icon" src="assets/img/delete-icon.png" onclick="deleteProject(${huidigProject.id})" data-toggle="modal" data-target="#deleteProjectModal">
                            </div>
                        </div>
                                `
        );
    });
    output.push(`
                        <div class="col-md-6 col-lg-4">
                    <div class="card-body"><img id="card-add-icon" src="assets/img/add-icon.png" onclick="gotoPortfolioAdd()"></div>
                        </div>
    `)
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
function gotoPortfolioAdd(){
    window.location.href = "portfolioadd-admin.php?admin=true";
}
function deleteProject(id){
     projectName = findProjectNameById(id);
     document.getElementById("modal-body-text1").innerText = "Weet je zeker dat je '" + projectName + "' wilt verwijderen?";
     document.getElementById("deleteProjectButton1").onclick =  function() {
         parent.location = "portfoliodelete-admin.php?admin=true&projectid=" + id;
     }
}
function findProjectNameById(id){
    for (i = 0; i < projecten.length; i++){
        if (projecten[i].id == id){
            return projecten[i].titel;
        }
    }
}
const projectContainer = document.getElementById("projectsContainer");
bouwProjectLijst();
styleProjectLijst();