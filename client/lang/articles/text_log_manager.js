function setLanguageLinkAttribute(currentUrl) {
    document.getElementById("enLangLink").setAttribute("href", "/en" + currentUrl);
    document.getElementById("brLangLink").setAttribute("href", "/br" + currentUrl);
}