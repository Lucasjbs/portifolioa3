function ajaxLoginRequest(requestData) {
    $.ajax({
        type: 'POST',
        url: 'entrypoint.php',
        async: true,
        data: requestData,
        success: function (response) {
            // window.location.href = "/";
            alert("Sign up complete!");
        },
        error: function (xhr, status, error) {
            alert("Unable to complete login!");
            return "Invalid data!";
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