
// Wanneer er 3 keer geklikt wordt op de logo wordt je omgeleid naar de login-pagina.
var throttle = false;
document.querySelector('#logoLink').addEventListener('click', function (evt) {
    var o = this

    if (!throttle && evt.detail === 2) {
        document.getElementById("logoLink").style.cursor = "pointer";
        throttle = true;
        setTimeout(function () {

            throttle = false;
            document.getElementById("logoLink").style.cursor = "auto";
        }, 1300);
    } else if (document.getElementById("logoLink").style.cursor === "pointer"){
        window.location.href = "login.php"
    }
});