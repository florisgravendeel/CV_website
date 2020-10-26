


function readLetter(id) {
    window.location.href = "contactlist_view.php?admin=true&projectid=" + id;
}
function addRowHandlers() {
    var table = document.getElementById("contaclist-table");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler =
            function(row)
            {
                return function() {
                    var cell = row.getElementsByTagName("td")[4];
                    var id = cell.innerHTML;
                    readLetter(id);
                };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
}
window.onload = addRowHandlers();