function ajaxSessionRequest(requestData) {
    return new Promise(function (resolve, reject) {
        $.ajax({
            type: 'GET',
            url: '/entrypoint.php',
            async: true,
            data: requestData,
            success: function (response) {
                console.log("Success: ");
                console.log(response);
                if (response !== "" && response !== null) {
                    const userData = JSON.parse(response);
                    resolve(userData.data.user);
                }
                resolve();
            },
            error: function (xhr, status, error) {
                console.log("Failure: ");
                console.log(xhr.responseText);
                // reject(JSON.parse(xhr.responseText));
            }
        })
    });
}

function checkSessionForHeader() {
    const requestData = {
        "action": "sessionCheck",
    };

    ajaxSessionRequest(requestData).then(function (data) {
        const profileNav = document.querySelector('.globalNav-item.type-profile');
        const logoutNav = document.querySelector('.globalNav-item.type-logout');
        profileNav.removeAttribute("v-cloak");
        logoutNav.removeAttribute("v-cloak");

        const loginNav = document.querySelector('.globalNav-item.type-login');
        const registertNav = document.querySelector('.globalNav-item.type-register');
        loginNav.setAttribute("v-cloak", "");
        registertNav.setAttribute("v-cloak", "");
    }).catch(function (err) {
        return false;
    });

}
let isUserLoggedInHeader = checkSessionForHeader();

function checkSessionForProfile() {
    if (isUserLoggedInHeader === false) {
        window.location.href = "/login";
        return;
    }

    const requestData = {
        "action": "sessionData",
    };

    ajaxSessionRequest(requestData).then(function (data) {
        const userName = document.getElementById('userName');
        const userEmail = document.getElementById('userEmail');
        userName.innerHTML = "Your name: " + data.name;
        userEmail.innerHTML = "Your email: " + data.email;
    }).catch(function (err) {
        window.location.href = "/login";
    });
}