function ajaxAdminResponseHandler(response, action) {
    if (response.status == 201 && action == "superUserIndex") {
        const adminContent = document.getElementById('adminContent');
        adminContent.innerHTML = response.data.content;
    }

    if (response.status == 201 && action == "superUserPage") {
        const adminContent = document.getElementById('adminContent');
        adminContent.innerHTML = response.data.content;
    }

    if (response.status == 401) {
        window.location.href = "/";
    }
}

function ajaxAdminRequest(requestData) {
    $.ajax({
        type: 'GET',
        url: '/entrypoint.php',
        async: true,
        data: requestData,
        success: function (response) {
            ajaxAdminResponseHandler(JSON.parse(response), requestData.action);
        },
        error: function (xhr, status, error) {
            ajaxAdminResponseHandler(JSON.parse(xhr.responseText), requestData.action);
        }
    });
}

function getAdminPageIndex() {
    const requestData = {
        "action": "superUserIndex",
    };

    ajaxAdminRequest(requestData);
}

function getAdminTextLog() {
    const textLogUrl = window.location.href;
    const match = textLogUrl.match(/\/(\d+)\/?$/);

    if (match && match[1]) {
        const requestData = {
            "action": "superUserPage",
            "page": match[1],
        };

        ajaxAdminRequest(requestData);
    } else {
        alert("Unable to complete request!");
    }
}