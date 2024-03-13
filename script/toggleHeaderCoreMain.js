
function toogleHeaderCoreMain(type) {
    removeAllActives();

    switch (type) {
        case 'tools':
            var HeaderCoreMain = document.querySelector('.floorTab-item.type-tools');
            HeaderCoreMain.classList.add('is-active');
            break;
        case 'portfolio':
            var HeaderCoreMain = document.querySelector('.floorTab-item.type-portfolio');
            HeaderCoreMain.classList.add('is-active');
            break;
        case 'admin':
            var HeaderCoreMain = document.querySelector('.floorTab-item.type-admin');
            HeaderCoreMain.classList.add('is-active');
            break;
        default:
            break;
    }
}

function removeAllActives() {
    const section1 = document.querySelector('.floorTab-item.type-home');
    const section2 = document.querySelector('.floorTab-item.type-tools');
    const section3 = document.querySelector('.floorTab-item.type-portfolio');
    const section8 = document.querySelector('.floorTab-item.type-admin');

    section1.classList.remove('is-active');
    section2.classList.remove('is-active');
    section3.classList.remove('is-active');
    section8.classList.remove('is-active');
}