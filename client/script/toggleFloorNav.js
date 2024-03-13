
function toogleFloorNav(type) {
    removeAllActiveFloors();

    switch (type) {
        case 'timer-tools':
            var FloorNav = document.querySelector('.headerNav-item.home');
            FloorNav.classList.add('is-active');
            break;
        case 'us-conversor':
            var FloorNav = document.querySelector('.headerNav-item.date');
            FloorNav.classList.add('is-active');
            break;
        case 'random-generator':
            break;
        default:
            break;
    }
}

function removeAllActiveFloors() {
    const subsection1 = document.querySelector('.home');
    const subsection2 = document.querySelector('.date');

    subsection1.classList.remove('is-active');
    subsection2.classList.remove('is-active');
}