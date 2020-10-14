//alert("HWEEWEY");
var els = document.getElementsByClassName("nav-link");
for(var i = 0; i < els.length; i++)
{
    href = els[i].getAttribute("href");
    href += "?admin=true";
    els[i].setAttribute("href", href);
    console.log("Element: " + els[i].getAttribute("href"));
}