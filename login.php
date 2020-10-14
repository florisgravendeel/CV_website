<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Floris CV Website</title>
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
    <div id="login-one" class="login-one">
        <form class="login-one-form">
            <div class="col">
                <div class="login-one-ico"><img id="loginicon" src="assets/img/florisgravendeellogo.png"></div>
                <div class="form-group">
                    <div>
                        <h3 id="heading">&nbsp;</h3>
                    </div><input class="form-control login-input" type="text" name="username" id="login-username" placeholder="Gebruikersnaam">

                    <input class="form-control login-input" type="password" name="password" id="login-password" placeholder="Wachtwoord">
                        <button class="btn btn-primary login-input" id="button" onclick="validCred()" style="background-color:#007ac9;">Log in</button>
                </div>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/--mp--Animated-progress-bar-in-viewport-1.js"></script>
    <script src="assets/js/--mp--Animated-progress-bar-in-viewport.js"></script>
    <script>
        function validCred(){
            window.open("index.php?admin=true");
        }
    </script>
</body>
</html>