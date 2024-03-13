document.getElementById("enLangLink").setAttribute("href", "/en");
document.getElementById("brLangLink").setAttribute("href", "/br");

const regexEn = /\/(en)(?![A-Z])/;
const regexBr = /\/(br)(?![A-Z])/;
const url = window.location.href;

if (regexBr.test(url)) {
    // Language = Portuguese
    const toggleLanguage = document.getElementById('dropdown_language');
    toggleLanguage.classList.remove('type_english');
    toggleLanguage.classList.add('type_portuguese');

    document.documentElement.setAttribute('lang', 'pt');

    const headerDescriptionElement = document.getElementById("header_description");
    headerDescriptionElement.textContent = "Bem vindo a minha bancada de trabalho!";

}
else {
    // Language = English (Default)

}