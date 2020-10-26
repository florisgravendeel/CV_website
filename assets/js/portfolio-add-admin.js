formlist = ["formUploadProject1","formUploadProject2",
    "formUploadProject3","formUploadProject4", "formUploadProject5",
    "formUploadProject6", "formUploadProject7"];

function sendProjectForm(){
    formComplete = true;
    for (i = 0; i < formlist.length; i++){
        var varForm = document.getElementById(formlist[i]).value;
        if (varForm === ""){
            checkmarkbyId(false, formlist[i]);
            formComplete = false;
        } else {
            checkmarkbyId(true, formlist[i]);
        }
    }
    console.log(formComplete);
}

function checkmarkbyId(bool, id){
    var elm = document.getElementById(id);

    if (bool){
        if (elm.classList.contains("is-invalid")){
            elm.classList.remove("is-invalid");
        }
        if (!elm.classList.contains("is-valid")){
            elm.classList.add("is-valid");
        }
    } else {
        if (elm.classList.contains("is-valid")){
            elm.classList.remove("is-valid")
        }
        if (!elm.classList.contains("is-invalid")){
            elm.classList.add("is-invalid");
        }
    }
}

function processMessage() {
    var A = checkName();
    var B = checkEmail();
    var C = checkMessage();
    if (A && B && C){ // Het formulier is correct ingevuld.
        alert("Bericht verstuurd!");
        window.location.href = "opsturen_bericht.php?w1=" + getName() + "&w2=" + getEmail() + "&w3=" + getMessage();
    } else {
        alert("Oeps, er ging iets fout met het sturen van je bericht!");
    }
}