
function ajaxPostRequest(requestData) {
    $.ajax({
        type: 'POST',
        url: 'entrypoint.php',
        async: true,
        data: requestData,
        success: function (response) {
            // create login section
            // window.location.href = "/";
            alert("Sign up complete!");
        },
        error: function (xhr, status, error) {
            httpRequestMessage = JSON.parse(xhr.responseText);
            if (httpRequestMessage.message == "Email already exists!") {
                const nameErrorMessage = document.getElementById('signupEmailError');
                nameErrorMessage.innerHTML = "*email already exists!";
                return "Email already exists!";
            }
            alert("Unable to complete request!");
            return "Invalid name!";
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
        nameErrorMessage.innerHTML = "*name length must be between 4 and 45 characters!";
        return "Invalid name!";
    }

    if (specialChars.test(name)) {
        const nameErrorMessage = document.getElementById('signupNameError');
        nameErrorMessage.innerHTML = "*name cannot contain special characters!";
        return "Invalid name!";
    }

    if (!emailChars.test(email)) {
        const emailErrorMessage = document.getElementById('signupEmailError');
        emailErrorMessage.innerHTML = "*email must be Gmail or Hotmail!";
        return "Invalid email!";
    }

    if (password.length < 8 || password.length > 40) {
        const passwordErrorMessage = document.getElementById('signupPasswordError');
        passwordErrorMessage.innerHTML = "*password length must be between 8 and 40 characters!";
        return "Invalid password!";
    }

    if (specialChars.test(password)) {
        const passwordErrorMessage = document.getElementById('signupPasswordError');
        passwordErrorMessage.innerHTML = "*password cannot contain special characters!";
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