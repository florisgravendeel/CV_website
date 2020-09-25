<?php 
	require 'core/init.php';
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/quizstyle.css?d=<?php echo time(); ?>" />
    <title>Quiz</title>
</head>

<body>
    <h1 id="toptitle">Weekend Miljonairs</h1>

    <div class="quiz-container">
        <div id="quiz"></div>
    </div>
    <button id="previous">Vorige vraag</button>
    <button id="next">Volgende vraag</button>
    <button id="submit">Verstuur antwoord</button>
    <div id="questioncounter" style="margin-bottom: 20px;"></div>
    <div id="results"></div>
    <button id="5050" onclick="vijftigvijftig()" class="hulpmiddelen">50 - 50</button>
    <button id="publiek" onclick="vraaghetPubliek()" class="hulpmiddelen">Vraag het aan het publiek</button>
    <button id="hint" onclick="showHint()" class="hulpmiddelen">Hint</button>
  
    <button id="stopknop" onclick="naarScoreboard()">Stoppen</button>
    <?php
            // Alle data voor de quiz uit de database halen.
    if (!empty($quiz)) {
        $resultaat = $quiz->overzicht_quiz();
    }
        
            $vragen = array();
            $antwoord = array();
            $hint = array();
            $a = array();
            $b = array();
            $c = array();
            $d = array();
            foreach ($resultaat as $rij) {            
              array_push($vragen,$rij['vraag']);
              array_push($antwoord,$rij['antwoord']);
              array_push($hint,$rij['hint']);
              array_push($a,$rij['a']);
              array_push($b,$rij['b']);
              array_push($c,$rij['c']);
              array_push($d,$rij['d']);
            }
    ?>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        var vragen = <?php echo json_encode($vragen); ?>;
        var antwoord = <?php echo json_encode($antwoord); ?>;
        var hint = <?php echo json_encode($hint); ?>;

        var a = <?php echo json_encode($a); ?>;
        var b = <?php echo json_encode($b); ?>;
        var c = <?php echo json_encode($c); ?>;
        var d = <?php echo json_encode($d); ?>;

        var myQuestions = [];
        var questioncount1;
        let numCorrect = 0;
        const nextButton = document.getElementById("next");
        const submitButton = document.getElementById("submit");

        var powerups = [{
                name: "5050", //Toch maar een naam gegeven, dat maakt het makkelijker om alles van elkaar af te scheiden.
                object: document.getElementById("5050"),
                available: true
            },
            {
                name: "publiek",
                object: document.getElementById("publiek"),
                available: true
            },
            {
                name: "hint",
                object: document.getElementById("hint"),
                available: true
            }
        ];
        
        // Alle data van de PHP doorgeven aan Javascript. Anders kunnen we geen quiz laten zien op de site.
        for (i = 0; i < vragen.length; i++) {
            var vraag = {
                question: vragen[i],
                answers: {
                    a: a[i],
                    b: b[i],
                    c: c[i],
                    d: d[i]
                },
                correctAnswer: antwoord[i],
                hint: hint[i]
            };
            myQuestions.push(vraag);
        }

        // Google charts laden. Anders kan ik geen grafieken tekenen.  
        google.charts.load('current', {
            'packages': ['corechart']
        });

        // De grafiek configuren:
        function drawChart() {
            var index = questioncount1 - 1;
            var a = "A: " + myQuestions[index].answers.a; //Antwoord A laden, op basis van welke vraag we er zijn.
            var b = "B: " + myQuestions[index].answers.b;
            var c = "C: " + myQuestions[index].answers.c;
            var d = "D: " + myQuestions[index].answers.d;
            var correctAnswer = myQuestions[index].correctAnswer; //We moeten weten wat het goeie antwoord is van de vraag.
            var data;
            switch (correctAnswer) {
                case "a":
                    data = google.visualization.arrayToDataTable([
                        ['Antwoord', 'Aantal mensen'],
                        [a, Math.floor(Math.random() * 35) + 10], //Het goeie antwoord (in dit geval) A, scoort tussen 35 en 10 mensen. 
                        [b, Math.floor(Math.random() * 15) + 5], //Terwijl het foute antwoord B scoort tussen 15 en 5 mensen. 
                        [c, Math.floor(Math.random() * 25) + 8], //Geeft een willekeurig getal tussen 10 en 5 (beide inbegrepen)
                        [d, Math.floor(Math.random() * 10) + 5] 
                    ]);
                    break;
                case "b":
                    data = google.visualization.arrayToDataTable([
                        ['Antwoord', 'Aantal mensen'],
                        [a, Math.floor(Math.random() * 15) + 5],
                        [b, Math.floor(Math.random() * 35) + 10],
                        [c, Math.floor(Math.random() * 25) + 8],
                        [d, Math.floor(Math.random() * 10) + 5]
                    ]);
                    break;
                case "c":
                    data = google.visualization.arrayToDataTable([
                        ['Antwoord', 'Aantal mensen'],
                        [a, Math.floor(Math.random() * 15) + 5],
                        [b, Math.floor(Math.random() * 25) + 8],
                        [c, Math.floor(Math.random() * 35) + 10],
                        [d, Math.floor(Math.random() * 10) + 5]
                    ]);
                    break;
                case "d":
                    data = google.visualization.arrayToDataTable([
                        ['Antwoord', 'Aantal mensen'],
                        [a, Math.floor(Math.random() * 15) + 5],
                        [b, Math.floor(Math.random() * 10) + 5],
                        [c, Math.floor(Math.random() * 25) + 8],
                        [d, Math.floor(Math.random() * 35) + 10]
                    ]);
                    break;
                default: // Mocht het toch misgaan, vul dan alle waardes met 1.
                    data = google.visualization.arrayToDataTable([
                        ['Antwoord', 'Aantal mensen'],
                        [a, 1],
                        [b, 1],
                        [c, 1],
                        [d, 1]
                    ]);
                    break;
            }
            var options = {
                'title': myQuestions[index].question,
                'width': 950,
                'height': 400
            };
            // Plaats de grafiek in het <div> element met id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }

        (function() {
            function buildQuiz() {
                // We hebben een plek nodig om alle HTML output in op te slaan
                const output = [];

                // Voor elke vraag
                myQuestions.forEach((currentQuestion, questionNumber) => {
                    // We willen alle antwoorden opslaan
                    const answers = [];
                    // voor elk beschikaar antwoord..
                    for (letter in currentQuestion.answers) {
                        // ... voeg een HTML radio button toe
                        answers.push(
                            `
					
					<label id="${questionNumber}${letter}">
						<input type="radio"  name="question${questionNumber}" value="${letter}">
        
              ${letter} :
              ${currentQuestion.answers[letter]}
                   		
						</label>`
                        );
                    }
                    // Voeg de vraag met de antwoorden toe aan de output.
                    output.push(
                        `
						
						<div class="slide">
							<div class="question"> ${currentQuestion.question} </div>
							<div class="answers"> ${answers.join("")} </div>
						</div>`
                    );
                });
                // Combineer de output in 1 string van HTML en laat het zien op de pagina
                quizContainer.innerHTML = output.join("");
            }
            function showResult() {
                // Pak het antwoord van de quiz.
                const answerContainers = quizContainer.querySelectorAll(".answers");
                
                var index = questioncount1 - 1;
                var currentQuestion = myQuestions[index];

                // find selected answer
                const answerContainer = answerContainers[index];

                const selector = `input[name=question${index}]:checked`;
                const userAnswer = (answerContainer.querySelector(selector) || {}).value;


                // Het antwoord is goed
                if (userAnswer === currentQuestion.correctAnswer) {
                    // Voeg een punt toe aan het totaal aantal goeie antwoorden
                    numCorrect++;
                    disableNextButton(false);

                } else {
                    // Het antwoord is fout
                    submitButton.disabled = true;
                    submitButton.style.opacity = "0.6";
                    submitButton.style.cursor = "not-allowed";
                }
                // Kleur alle antwoorden rood.
                answerContainer.style.color = "red";

                disableSubmitButton(true);

                // Krijg het ID van het goeie antwoord
                var id = index + currentQuestion.correctAnswer;

                // Maak een variabel van het goeie antwoord
                var correctAns = document.getElementById(id);
                //Kleur het correcte antwoord groen.
                correctAns.style.color = "lightgreen";
                disablePowerups(true);
            }
            // Elke keer dat we vaan slide veranderen moeten wij informatie updaten. Denk aan de vragen of de afbeeldingen.
            function showSlide(n) {
                questioncounter1.innerHTML = `Vraag ${questioncount1} van ${myQuestions.length}`; 
                slides[currentSlide].classList.remove("active-slide");
                slides[n].classList.add("active-slide");
                currentSlide = n;
                //Bij de eerste slide hebben we geen terug-knop nodig.
                if (currentSlide === 0) {
                    previousButton.style.display = "none";
                } else {
                    //Bij alle andere mogelijkheden wel.
                    previousButton.style.display = "inline-block";
                }
                // Bij het einde van de slides willen wij voorkomen dat de persoon op de Volgende vraag-knop klikt.
                if (currentSlide === slides.length - 1) {
                    nextButton.style.display = "none";
                    submitButton.style.display = "inline-block";
                } else {
                    //Zo niet, dan mag de knop gewoon zichtbaar zijn.
                    nextButton.style.display = "inline-block";
                    submitButton.style.display = "inline-block";
                }
                // We zijn nu bij een slide waarbij de speler de vraag nog moet beantwoorden.
                if ((numCorrect + 1) == questioncount1) {
                    disableNextButton(true); //De speler moet eerst de vraag beantwoorden, dus de speler kan niet op de Volgende-vraag-knop klikken.
                    disablePowerups(false); // We willen dat de powerups alleen verkrijgbaar zijn voor de vragen die je nog moet beantwoorden.
                    disableSubmitButton(false); 
                } else {
                    disableNextButton(false);
                    disablePowerups(true);
                }

            }
            //Ga naar de volgende slide (of in dit geval: de volgende vraag)
            function showNextSlide() {
                questioncount1 = questioncount1 + 1;
                showSlide(currentSlide + 1);
                plusSlides(1);
            }
            //Ga naar de vorige slide.
            function showPreviousSlide() {
                questioncount1 = questioncount1 - 1;
                showSlide(currentSlide - 1);
                plusSlides(-1);
            }

            const quizContainer = document.getElementById("quiz");
            
            questioncount1 = 1;
            const questioncounter1 = document.getElementById("questioncounter");

            // Bouw de quiz.
            buildQuiz();

            const previousButton = document.getElementById("previous");
            const slides = document.querySelectorAll(".slide");
            let currentSlide = 0;

            showSlide(0);
            //Voeg een EventListener toe, dit houdt in: bij een klik -> ga naar functie.
            submitButton.addEventListener("click", showResult);
            previousButton.addEventListener("click", showPreviousSlide);
            nextButton.addEventListener("click", showNextSlide);
            disableNextButton(true);
        })();

        //De speler klikt op de vraaghetPubliek-knop.
        function vraaghetPubliek() {
            var r = confirm("Je krijgt een grafiek te zien van wat het publiek denkt.\nLET OP: Dit kan je maar 1x gebruiken!")
            // Klikt op OK
            if (r == true) {
                var modal1 = document.getElementById('myModal');
                modal1.style.display = "block";
                var publiekButton = document.getElementById("publiek");
                publiekButton.disabled = true;
                publiekButton.style.opacity = "0.6";
                publiekButton.style.cursor = "not-allowed";
                var span = document.getElementsByClassName("close")[0];

                google.charts.setOnLoadCallback(drawChart); //Teken de diagram. 
                
                //Zorg ervoor dat het hulpmiddel niet meer beschikbaar is.
                for (var i = 0; i < powerups.length; i++) {
                    if (powerups[i].name === "publiek") {
                        powerups[i].available = false;
                    }
                }
                //Klik je op het kruis, dan sluit de modal.
                span.onclick = function() {
                    modal1.style.display = "none";
                }
                // Sluit de modal als de speler buiten de modal klikt.
                window.onclick = function(event) {
                    if (event.target == modal1) {
                        modal1.style.display = "none";
                    }
                }
            }
        }
        // De speler klikt op de Hint-knop.
        function showHint() {
            var r = confirm("Wanneer je op OK klikt krijg je een hint te zien.\nLET OP: Dit kan je maar 1x gebruiken!")
            // Klikt op OK.
            if (r == true) {
                var modal2 = document.getElementById('myModal2');
                modal2.style.display = "block";
                var hintButton = document.getElementById("hint");
                hintButton.disabled = true;
                hintButton.style.opacity = "0.6";
                hintButton.style.cursor = "not-allowed";
                var span = document.getElementById("close2");
                var hinttext = document.getElementById("hint-text");

                var index = questioncount1 - 1; //Krijg de index van de vraag. We moeten wel de goeie hint laden.
                var hint = myQuestions[index].hint; //Laad de hint.
                hinttext.innerHTML = hint; //Plaats de hint in de modal.

                //Zorg ervoor dat de hint als hulpmiddel niet meer beschikbaar is.
                for (var i = 0; i < powerups.length; i++) {
                    if (powerups[i].name === "hint") {
                        powerups[i].available = false;
                    }
                }

                span.onclick = function() {
                    modal2.style.display = "none";
                }
                window.onclick = function(event) {
                    if (event.target == modal2) {
                        modal2.style.display = "none";
                    }
                }
            }
        }
        // De gebruiker klikt op de 50-50 knop.
        function vijftigvijftig() {
            var r = confirm("Wanneer je op OK klikt zullen 2 fouten antwoorden verdwijnen.\nLET OP: Dit kan je maar 1x gebruiken!")
            // Klikt op OK
            if (r == true) {

                var vijfButton = document.getElementById("5050");
                vijfButton.disabled = true;
                vijfButton.style.opacity = "0.6";
                vijfButton.style.cursor = "not-allowed";


                var index = questioncount1 - 1;
                var currentQuestion = myQuestions[index];
                /**Alle multiple choice antwoorden hebben een ID. Zo heeft antwoord A bij de eerste vraag het ID 0a.
                En heeft antwoord C bij vraag 2 -> ID: 1C.
                */
                var id; //We moeten 2 foute antwoorden rood inkleuren.
                var id2;
                
                id = index + "b";
                id2 = index + "c";
                switch (currentQuestion.correctAnswer) { //We willen niet dat het goeie antwoord rood wordt gekleurd. Daarom gebruiken een switch.
                    case "a":
                        id = index + "b";
                        id2 = index + "c";
                        break;
                    case "b":
                        id = index + "a";
                        id2 = index + "c";
                        break;
                    case "c":
                        id = index + "b";
                        id2 = index + "d";
                        break;
                    case "d":
                        id = index + "a";
                        id2 = index + "c";
                        break;
                    default:
                        alert("Er is iets verkeerd gegaan.")
                        break;
                }
                var elm1 = document.getElementById(id);
                var elm2 = document.getElementById(id2);
                //Kleur de 2 foute antwoorden rood.
                elm1.style.color = "red";
                elm2.style.color = "red";
                // Maak het hulpmiddel niet meer beschikbaar.
                for (var i = 0; i < powerups.length; i++) {
                    if (powerups[i].name === "5050") {
                        powerups[i].available = false;
                    }
                }

            }
        }

        //Deze functie schakelt de VolgendeVraag-knop aan of uit.
        function disableNextButton(bool) {
            if (bool) {
                nextButton.disabled = true;
                nextButton.style.opacity = "0.6";
                nextButton.style.cursor = "not-allowed";

            } else {
                nextButton.disabled = false;
                nextButton.style.opacity = "1";
                nextButton.style.cursor = "pointer";
            }
        }
        //Deze functie schakelt de VerstuurAntwoorden-knop aan uit
        function disableSubmitButton(bool) {
            if (bool) {
                submitButton.disabled = true;
                submitButton.style.opacity = "0.6";
                submitButton.style.cursor = "not-allowed";

            } else {
                submitButton.disabled = false;
                submitButton.style.opacity = "1";
                submitButton.style.cursor = "pointer";
            }
        }
        // Deze methode is gemaakt zodat je bij vragen die je AL gemaakt hebt NIET de mogelijkheid krijgt om vervolgens nog een hulpmiddel te gebruiken.
        function disablePowerups(bool) {
            if (bool) {
                for (var i = 0; i < powerups.length; i++) {
                    if (powerups[i].available) {
                        powerups[i].object.disabled = true;
                        powerups[i].object.style.opacity = "0.6";
                        powerups[i].object.style.cursor = "not-allowed";
                    }
                }
            } else {
                for (var i = 0; i < powerups.length; i++) {
                    if (powerups[i].available) {
                        powerups[i].object.disabled = false;
                        powerups[i].object.style.opacity = "1";
                        powerups[i].object.style.cursor = "pointer";
                    }
                }

            }
        }
        //Een array die bepaald hoeveel euro de gebruiker wint.    
        var punten = [0,100,200,500,1000,2000,5000,10000,15000,25000,50000,100000,175000,300000,500000,1000000];
        
        // Deze functie wordt geopent nadat je op stoppen klikt.
        function naarScoreboard() {
            var totaalpunten = numeral(punten[numCorrect]).format('0,0'); //1000 zou nu 1,000 worden
            totaalpunten = totaalpunten.replace(/,/g,"."); //en van 1,000 wordt nu 1.000
            
            var r = confirm("Weet je zeker dat je wilt stoppen?\nAls je nu stopt win je "+ totaalpunten + " euro.");
            if (r == true) { //De gebruiker klikt op OK.
                var gebruikersnaam = prompt("Voer hier je naam in:", "");
                if (gebruikersnaam != null){
                    // Upload de score en de gebruiker naar het scoreboard.
                    window.location.href = "opsturen_scoreboard.php?w1=" + gebruikersnaam + "&w2=" + punten[numCorrect];
                }
            }
        }
    </script>
</body>
<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h1>Wat denkt het publiek?</h1>
        </div>
        <div class="modal-body">
            <div id="piechart"></div>
            <script type="text/javascript">
            </script>
            <h4>LET OP: Nadat je op sluiten hebt geklikt, kan je deze grafiek niet meer terughalen!</h4>
        </div>
    </div>
</div>
<div id="myModal2" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span id="close2" class="close">&times;</span>
            <h1>Hint!</h1>
        </div>
        <div class="modal-body">
            <h2 id="hint-text"></h2>
            <h4>LET OP: Nadat je op sluiten hebt geklikt, kan je dit venster niet opnieuw openen!</h4>
        </div>
    </div>
</div>

<div class="slideshow-container">

<div class="mySlides fade">
  <img src="images/1.png" style="width:35%">
</div>
<div class="mySlides fade">
  <img src="images/2.png" style="width:42%">
</div>
<div class="mySlides fade">
  <img src="images/3.png" style="width:42%">
</div>    
<div class="mySlides fade">
  <img src="images/4.png" style="width:42%">
</div>
<div class="mySlides fade">
  <img src="images/5.png" style="width:42%">
</div>
<div class="mySlides fade">
  <img src="images/6.png" style="width:40%">
</div>
<div class="mySlides fade">
  <img src="images/7.png" style="width:30%">
</div>
<div class="mySlides fade">
  <img src="images/8.png" style="width:35%">
</div>
<div class="mySlides fade">
  <img src="images/9.png" style="width:35%">
</div>
<div class="mySlides fade">
  <img src="images/10.png" style="width:45%">
</div>
<div class="mySlides fade">
  <img src="images/11.png" style="width:35%">
</div>
<div class="mySlides fade">
  <img src="images/12.png" style="width:24%">
</div>
<div class="mySlides fade">
  <img src="images/13.png" style="width:32%">
</div>
<div class="mySlides fade">
  <img src="images/14.png" style="width:40%">
</div>
<div class="mySlides fade">
  <img src="images/15.png" style="width:40%">
</div>

</div>

<script>
//Het script hieronder is puur alleen voor de afbeeldingen. 
var slideIndex = 1;
showSlides(slideIndex);
    
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
}
</script>
</html>