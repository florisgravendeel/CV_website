<!DOCTYPE html>
<html lang="nl">
<head>
    <title>PDF Viewer PDF.js</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="assets/css/pdf.css" />
</head>

<body>
<div id="app">
    <div role="toolbar" id="toolbar">
        <div id="pager">
            <button data-pager="prev">Vorige</button>
            <button data-pager="next">Volgende</button>
        </div>
        <div id="page-mode">
            <label>Pagina Mode <input type="number" value="1" min="1"/></label>
        </div>
    </div>
    <div id="viewport-container"><div role="main" id="viewport"></div></div>
</div>
<?php
// Kijken naar de parameter (pdfview.php?file=cv.pdf)
if (isset($_GET["file"])) {
    // Pak de variabel uit de url.
    $pdf = $_GET["file"];
}
?>
<script src="https://unpkg.com/pdfjs-dist@2.0.489/build/pdf.min.js"></script>
<script src="assets/js/pdfmenu.js"></script>
<script>
    var pdfFile = <?php echo json_encode($pdf, JSON_PRETTY_PRINT) ?>;
    if (pdfFile.endsWith(".pdf")){
        var pdfName = pdfFile.replace(".pdf", "");
        document.title = "FG - " + pdfName;
        initPDFViewer("assets/files/" + pdfFile);
    } else {
        alert("Het bestand dat je zoekt bestaat niet!");
    }
</script>
</body>
</html>