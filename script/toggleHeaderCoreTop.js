const toggleLanguage = document.getElementById('dropdown_language');
const dropLanguageGroup = document.querySelector('.header_dropdown_nav_group.type_language');

toggleLanguage.addEventListener('click', function() {
    dropLanguageGroup.classList.toggle('is_active');
});

const toggleService = document.getElementById('dropdown_service');
const dropServiceGroup = document.querySelector('.header_dropdown_nav_group.type_service');

toggleService.addEventListener('click', function() {
    dropServiceGroup.classList.toggle('is_active');
});
