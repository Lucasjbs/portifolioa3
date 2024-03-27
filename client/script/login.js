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
        url: '/entrypoint.php',
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

function clientSideValidation(requestData) {
    const specialChars = /[@:;\-<>()\[\]{}]/;
    const emailChars = /@gmail\.com|@hotmail\.com/;
    const email = requestData['email'];
    const password = requestData['password'];

    if (!emailChars.test(email)) {
        const emailErrorMessage = document.getElementById('signupEmailError');
        emailErrorMessage.innerHTML = "* email must be a valid Gmail or Hotmail!";
        return "Invalid email!";
    }

    if (password.length < 8 || password.length > 40) {
        const passwordErrorMessage = document.getElementById('signupPasswordError');
        passwordErrorMessage.innerHTML = "* password length must be between 8 and 40 characters!";
        return "Invalid password!";
    }

    if (specialChars.test(password)) {
        const passwordErrorMessage = document.getElementById('signupPasswordError');
        passwordErrorMessage.innerHTML = "* password cannot contain special characters!";
        return "Invalid password!";
    }

    return "Valid";
}

function checkDataAndMakeLogin() {
    const emailInput = document.getElementById("signupEmail").value;
    const passwordInput = document.getElementById("signupPassword").value;

    const requestData = {
        "action": "login",
        "email": emailInput,
        "password": passwordInput,
    };

    const status = clientSideValidation(requestData);
    if (status != "Valid") {
        return 0;
    }

    ajaxLoginRequest(requestData);
}