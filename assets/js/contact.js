function checkName() {
    var name = document.getElementById("form-name").value;
    var log1 = document.getElementById("name-error-message");



    if (name === "") {
        log1.innerHTML = "Voer uw naam in!";
        checkmarkbyId(false, "form-name");
        return false;
    } else { // Naam is correct! -->
        checkmarkbyId(true, "form-name");
        log1.innerHTML = " <br> ";
        return true;
    }
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

function checkMessage() {
    var message = document.getElementById("form-message").value;
    var log2 = document.getElementById("msg-error-message");
    if (message === "") {
        log2.innerHTML = "Voer een bericht in!";
        checkmarkbyId(false, "form-message");
        return false;
    } else { // Bericht is correct! -->
        log2.innerHTML = " <br> ";
        checkmarkbyId(true, "form-message");
        return true;
    }
}
function checkEmail() {
    var email = document.getElementById("form-email").value;
    var log3 = document.getElementById("email-error-message");
    var validEmail = isEmailValid(email);
    if (email === "" || !validEmail) {
        log3.innerHTML = "Voer een geldig email adres in!";
        checkmarkbyId(false, "form-email");
        return false;
    } else { // Email is correct! -->
        log3.innerHTML = " <br> ";
        checkmarkbyId(true, "form-email");
        return true;
    }
}
// Heeft het adres een apenstaartje en een geldige domeinnaam?
function isEmailValid(email){
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
function getName(){
    return document.getElementById("form-name").value;
}
function getEmail(){
    return document.getElementById("form-email").value;
}
function getMessage(){
    return document.getElementById("form-message").value;
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