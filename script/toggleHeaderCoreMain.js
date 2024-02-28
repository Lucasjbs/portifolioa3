
function toogleHeaderCoreMain(type) {
    removeAllActives();

    switch (type) {
        case 'tools':
            const HeaderCoreMain = document.querySelector('.floorTab-item.type-tools');
            HeaderCoreMain.classList.add('is-active');
            break;
        default:
            break;
    }
}

function removeAllActives() {
    const section1 = document.querySelector('.floorTab-item.type-home');
    const section2 = document.querySelector('.floorTab-item.type-tools');

    section1.classList.remove('is-active');
    section2.classList.remove('is-active');
}