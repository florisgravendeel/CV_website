function gotoInbox(){
    window.location.href = "contactlist.php?admin=true";
}
function deleteMail(id){
    //alert("Hey" + id);
    window.location.href = "contactlist_delete.php?admin=true&projectid=" + id;
}