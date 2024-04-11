document.getElementById("enLangLink").setAttribute("href", "/en");
document.getElementById("brLangLink").setAttribute("href", "/br");

if (isLanguagePortuguese) {
    document.querySelector(".title_main").innerHTML = "<h2>Artigos</h2>";
}