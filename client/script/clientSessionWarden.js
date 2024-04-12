function toggleGlobalNavForLoggedUser() {
    const profileNav = document.querySelector('.globalNav-item.type-profile');
    const logoutNav = document.querySelector('.globalNav-item.type-logout');
    profileNav.removeAttribute("v-cloak");
    logoutNav.removeAttribute("v-cloak");

    const loginNav = document.querySelector('.globalNav-item.type-login');
    const registertNav = document.querySelector('.globalNav-item.type-register');
    loginNav.setAttribute("v-cloak", "");
    registertNav.setAttribute("v-cloak", "");
}

function ajaxSessionResponseHandler(response, action) {
    if(response.status == 201 && action == "sessionCheck"){
        toggleGlobalNavForLoggedUser();
    }

    if(response.status == 201 && action == "sessionData"){
        const userName = document.getElementById('userName');
        const userEmail = document.getElementById('userEmail');
        userName.innerHTML = "Your name: " + response.data.user.name;
        userEmail.innerHTML = "Your email: " + response.data.user.email;
    }

    if(response.status == 401 && action == "sessionData"){
        window.location.href = "/login";
    }
}

function ajaxSessionRequest(requestData) {
    $.ajax({
        type: 'GET',
        url: '/entrypoint.php',
        async: true,
        data: requestData,
        success: function (response) {
            ajaxSessionResponseHandler(JSON.parse(response), requestData.action);
        },
        error: function (xhr, status, error) {
            ajaxSessionResponseHandler(JSON.parse(xhr.responseText), requestData.action);
        }
    });
}

function checkSessionForHeader() {
    const requestData = {
        "action": "sessionCheck",
    };

    ajaxSessionRequest(requestData);
}

function checkSessionForProfile() {
    const requestData = {
        "action": "sessionData",
    };

    ajaxSessionRequest(requestData);
}