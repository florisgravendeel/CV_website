<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FG - Contact</title>
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
    <link rel="stylesheet" href="assets/css/styles.css">
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
<div class="jumbotron jumbotron-contact">
    <div class="jumbotron-header-contact">
        <form method="post">
            <h2 class="text-center" id="contactme">Contact</h2>
            <div class="form-group"><input class="form-control" type="text" name="name" id="form-name" placeholder="Naam"></div><small class="form-text text-danger" id="name-error-message">&nbsp;</small>
            <div class="form-group"><input class="form-control" type="text" name="name" id="form-email" placeholder="Email"></div><small class="form-text text-danger" id="email-error-message">&nbsp;</small>
            <div class="form-group"><textarea class="form-control" id="form-message" name="message" placeholder="Bericht" rows="14"></textarea></div><small class="form-text text-danger" id="msg-error-message">&nbsp;</small>
            <div class="form-group"><button class="btn btn-primary" id="sendButton" type="button" onclick="processMessage()">Verstuur</button></div>
        </form>
    </div>
    <div class="jumbotron-contact-phone" style="height: 45px;">
        <h2 class="text-center" id="email-p">Ik ben ook bereikbaar tijdens werkdagen op: (<em>+31) 6 11 10 11 77.</em><br></h2>
    </div>
</div>
<script>
    function checkName() {
        var name = document.getElementById("form-name").value;

        var log1 = document.getElementById("name-error-message");
        if (name === "") {
            log1.innerHTML = "Voer uw naam in!";
            return false;
        } else { // Naam is correct! -->
            log1.innerHTML = " <br> ";
            return true;
        }
    }
    function checkMessage() {
        var message = document.getElementById("form-message").value;

        var log2 = document.getElementById("msg-error-message");
        if (message === "") {
            log2.innerHTML = "Voer een bericht in!";
            return false;
        } else { // Bericht is correct! -->
            log2.innerHTML = " <br> ";
            return true;
        }
    }
    function checkEmail() {
        var email = document.getElementById("form-email").value;
        var log3 = document.getElementById("email-error-message");
        var validEmail = isEmailValid(email);
        if (email === "" || !validEmail) {
            log3.innerHTML = "Voer een geldig email adres in!";
            return false;
        } else { // Email is correct! -->
            log3.innerHTML = " <br> ";
            return true;
        }
    }
    // Heeft het adres een apenstaartje en een geldige domeinnaam?
    function isEmailValid(email){
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
    function getName(){
        return document.getElementById("form-email").value;
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
</script>
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