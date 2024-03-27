const toggleLanguage = document.getElementById('dropdown_language');
const dropLanguageGroup = document.querySelector('.header_dropdown_nav_group');

toggleLanguage.addEventListener('click', function () {
    dropLanguageGroup.classList.toggle('is_active');
});

function hideNavbar(forceHide) {
    const navBarToggle = document.querySelector('.header_dropdown_nav_Link.type_option');
    const navBarSection1 = document.querySelector('.header_search');
    const navBarSection2 = document.querySelector('.header_main');
    const navBarSection3 = document.querySelector('.floorSubNav');
    const headerDescription = document.getElementById('header_description');

    if (navBarToggle.textContent == "Hide" || forceHide == true) {

        navBarSection1.setAttribute("v-cloak", "");
        navBarSection2.setAttribute("v-cloak", "");
        navBarSection3.setAttribute("v-cloak", "");
        headerDescription.classList.add("is-hidden");
        navBarToggle.innerHTML = "Show";
    }
    else {
        navBarSection1.removeAttribute("v-cloak");
        navBarSection2.removeAttribute("v-cloak");
        navBarSection3.removeAttribute("v-cloak");
        headerDescription.classList.remove("is-hidden");
        navBarToggle.innerHTML = "Hide";
    }
}