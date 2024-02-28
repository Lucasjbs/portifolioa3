
function toogleFloorNav(type) {
    removeAllActiveFloors();

    switch (type) {
        case 'timer-tools':
            var FloorNav = document.querySelector('.headerNav-item.top');
            FloorNav.classList.add('is-active');
            break;
        case 'us-conversor':
            var FloorNav = document.querySelector('.headerNav-item.game');
            FloorNav.classList.add('is-active');
            break;
        case 'random-generator':
            break;
        default:
            break;
    }
}

function removeAllActiveFloors() {
    const subsection1 = document.querySelector('.top');
    const subsection2 = document.querySelector('.game');
    console.log(subsection1);

    subsection1.classList.remove('is-active');
    subsection2.classList.remove('is-active');
}