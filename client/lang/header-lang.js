const regexEn = /\/(en)(?![A-Z])/;
const regexBr = /\/(br)(?![A-Z])/;
const url = window.location.href;

if (regexBr.test(url)) {
    // Language = Portuguese
    const toggleLanguage = document.getElementById('dropdown_language');
    toggleLanguage.classList.remove('type_english');
    toggleLanguage.classList.add('type_portuguese');
    document.documentElement.setAttribute('lang', 'pt');

    const headerDescription = document.getElementById("header_description");
    headerDescription.textContent = "Bem vindo a minha bancada de trabalho!";

    const languageTitle = document.querySelector(".type_language .header_dropdown_nav_Link");
    languageTitle.textContent = "Língua";

    const enLanguageDescription = document.getElementById("enLangLink");
    enLanguageDescription.textContent = "Inglês";

    const brLanguageDescription = document.getElementById("brLangLink");
    brLanguageDescription.textContent = "Português";

    const registerDescription = document.querySelector(".globalNav-item.type-register");
    registerDescription.innerHTML = '<a href="/registration"><i>Cadastrar</i></a>';

    const profileDescription = document.querySelector(".globalNav-item.type-profile");
    profileDescription.innerHTML = '<a href="/profile"><i>Perfil</i></a>';

    const workbenchLogo = document.querySelector(".logo");
    workbenchLogo.innerHTML = '<a href="/br" class="logo"><img src="/assets/horizontal_wretch2.png" alt="Workbench Logo" width="64" height="32"></a>';

    const guideDescriptionTitle = document.querySelector(".guide-description");
    guideDescriptionTitle.innerHTML = '<a href="#"><i>Guia</i></a>';

    const guideMenuList = document.querySelector(".menu_list");
    guideMenuList.innerHTML = '<li class="menu_list_item"><a href="/br/help" rel="noopener" target="_blank" class="link">Ajuda</a></li>' +
        '<li class="menu_list_item"><a href="/br/about" rel="noopener" target="_blank" class="link">Sobre o site</a></li>';

    const sectionTab = document.querySelector(".floorTab.type-section");
    sectionTab.innerHTML = '<li class="floorTab-item type-home is-active"><h1><a href="/br">Artigos</a></h1></li>' +
        '<li class="floorTab-item type-tools "><a href="/br/tools">Ferramentas</a></li>' +
        '<li class="floorTab-item type-portfolio "><a href="/br/portfolio">Portfólio</a> </li>' +
        '<li class="floorTab-item type-apps "><a href="/br">Section 4</a></li>' +
        '<li class="floorTab-item type-add "><a href="/br">Section 5</a></li>' +
        '<li class="floorTab-item type-add "><a href="/br">Section 6</a></li>' +
        '<li class="floorTab-item type-add "><a href="/br">Section 7</a></li>' +
        '<li class="floorTab-item type-admin "><a href="/br/admin">Admin</a></li>';

    const subSectionTab = document.querySelector(".headerNav");
    subSectionTab.innerHTML = '<li class="headerNav-item"><a href="/br" class="home is-active">Página Principal</a></li>' +
        '<li class="headerNav-item"><a href="/br" class="date">Subseção 2</a></li>' +
        '<li class="headerNav-item"><a href="/br" class="luck">Subseção 3</a></li>' +
        '<li class="headerNav-item"><a href="/br" class="measure">Subseção 4</a></li>' +
        '<li class="headerNav-item"><a href="/br" class="word">Subseção 5</a></li>' +
        '<li class="headerNav-item"><a href="/br" class="compass">Subseção 6</a></li>' +
        '<li class="headerNav-item"><a href="/br" class="block">Subseção 7</a></li>' +
        '<li class="headerNav-item"><a href="/br" class="luck">Subseção 8</a></li>' +
        '<li class="headerNav-item"><a href="/br" class="sign">Subseção 9</a></li>';
}
else {
    // Language = English (Default)
}