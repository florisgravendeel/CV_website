const typewriter1 = new Typewriter('#WelcomeText');
var profielinformatie = profileinfoQuery[0]["profileinfo"];
document.getElementById("introtext").innerHTML = profielinformatie;

typewriter1.typeString('Welkom!')
    .pauseFor(4500)
    .changeCursor(' ')
    .start();

for (let i=0; i<=500; i++) {
    animate(i);
}
function animate(i) {
    setTimeout(function() {
        // Voeg taken toe!
        setPercentageProgressBar("progress-bar1", getAnimateValue(i*i*0.90, 92));
        setPercentageProgressBar("progress-bar2", getAnimateValue(i*i*0.25,35));
        setPercentageProgressBar("progress-bar3", getAnimateValue(i*i*0.34,80));
        setPercentageProgressBar("progress-bar4", getAnimateValue(i*i*0.24,20));
        setPercentageProgressBar("progress-bar5", getAnimateValue(i*i*0.54,60));
        setPercentageProgressBar("progress-bar6", getAnimateValue(i*i,42));

    }, 100 * i);
}
function setPercentageProgressBar(id, width) {
    for (let i = 0; i < width; i++){
        document.getElementById(id).style.width = i + "%";
    }
}
function getAnimateValue(currentValue, maxValue) {
    if (currentValue >= maxValue) {
        return maxValue;
    } else if (currentValue < maxValue){
        return currentValue;
    }
}