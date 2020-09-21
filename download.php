<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Downloading..</title>
</head>
<body>
<?php
// Check if we have parameters w1 and w2 being passed to the script through the URL
if (isset($_GET["w1"])) {
    // Pak de variabel uit de url.
    $download = $_GET["w1"];

    //$file = "/assets/files/" . $download;
}
    $FileName = "/assets/files/WeekendMiljonairsQuiz.zip";
header('Content-disposition: attachment; filename="'.$FileName.'"');
readfile($FileName);
exit;
?>
</body>
</html>
