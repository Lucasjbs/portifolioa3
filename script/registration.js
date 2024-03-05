

function ajaxPostRequest(requestData) {
    $.ajax({
        type: 'POST',
        url: 'entrypoint.php',
        async: true,
        data: requestData,
        success: function (response) {
            // window.location.href = "/";
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
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

    ajaxPostRequest(requestData);
}