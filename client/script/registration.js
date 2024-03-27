
function responseErrorHandler(response) {
    const statusCode = response.data.error_index;
    if (statusCode === 1000) {
        const passwordErrorMessage = document.getElementById('signupPasswordError');
        passwordErrorMessage.innerHTML = "* " + response.message;
    }
    else if (statusCode === 1001) {
        const nameErrorMessage = document.getElementById('signupNameError');
        nameErrorMessage.innerHTML = "* " + response.message;
    }
    else if (statusCode === 1002 || statusCode === 1003) {
        const emailErrorMessage = document.getElementById('signupEmailError');
        emailErrorMessage.innerHTML = "* " + response.message;
    }
    else{
        alert("An unexpected error has occurred, check your credentials or try again later!");
    }
}

function ajaxPostRequest(requestData) {
    $.ajax({
        type: 'POST',
        url: '/entrypoint.php',
        async: true,
        data: requestData,
        success: function (response) {
            checkLoginPostRegistration(requestData.email, requestData.password);
        },
        error: function (xhr, status, error) {
            httpRequestMessage = JSON.parse(xhr.responseText);
            responseErrorHandler(httpRequestMessage);
        }
    });
}

function clientSideValidation(requestData) {
    const specialChars = /[@:;\-<>()\[\]{}]/;
    const emailChars = /@gmail\.com|@hotmail\.com/;
    const name = requestData['name'];
    const email = requestData['email'];
    const password = requestData['password'];

    if (name.length < 4 || name.length > 45) {
        const nameErrorMessage = document.getElementById('signupNameError');
        nameErrorMessage.innerHTML = "* name length must be between 4 and 45 characters!";
        return "Invalid name!";
    }

    if (specialChars.test(name)) {
        const nameErrorMessage = document.getElementById('signupNameError');
        nameErrorMessage.innerHTML = "* name cannot contain special characters!";
        return "Invalid name!";
    }

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

function sendRegistrationInputs() {
    const nameInput = document.getElementById("signupName").value;
    const emailInput = document.getElementById("signupEmail").value;
    const passwordInput = document.getElementById("signupPassword").value;

    const requestData = {
        "action": "store",
        "name": nameInput,
        "email": emailInput,
        "password": passwordInput,
    };

    const status = clientSideValidation(requestData);
    if (status != "Valid") {
        return 0;
    }

    ajaxPostRequest(requestData);
}