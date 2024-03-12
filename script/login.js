function responseErrorHandler(response) {
    const statusCode = response.data.error_index;
    if (statusCode === 1000) {
        const passwordErrorMessage = document.getElementById('signupPasswordError');
        passwordErrorMessage.innerHTML = "* " + response.message;
    }
    else if (statusCode === 1002) {
        const emailErrorMessage = document.getElementById('signupEmailError');
        emailErrorMessage.innerHTML = "* " + response.message;
    }
    else{
        alert("An unexpected error has occurred, check your credentials or try again later!");
    }
}

function ajaxLoginRequest(requestData) {
    $.ajax({
        type: 'POST',
        url: 'entrypoint.php',
        async: true,
        data: requestData,
        success: function (response) {
            window.location.href = "/";
        },
        error: function (xhr, status, error) {
            httpRequestMessage = JSON.parse(xhr.responseText);
            responseErrorHandler(httpRequestMessage);
        }
    });
}

function checkLoginPostRegistration(email, password) {
    const requestData = {
        "action": "login",
        "email": email,
        "password": password,
    };

    ajaxLoginRequest(requestData);
}

function checkDataAndMakeLogin(email, password) {
    // const email = getDocById(...)
    // const password = getDocById(...)

    // const requestData = {
    //     "action": "login",
    //     "email": email,
    //     "password": password,
    // };

    // ajaxLoginRequest(requestData);
}