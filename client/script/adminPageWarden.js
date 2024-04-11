function ajaxRequest(requestData) {
    return new Promise(function (resolve, reject) {
        $.ajax({
            type: 'GET',
            url: '/entrypoint.php',
            async: true,
            data: requestData,
            success: function (response) {
                console.log(response)
                if (response !== "" && response !== null) {
                    const userData = JSON.parse(response);
                    resolve(userData.data.content);
                }
                resolve();
            },
            error: function (xhr, status, error) {
                window.location.href = "/login";
                reject(JSON.parse(xhr.responseText));
            }
        })
    });
}

function getAdminPageIndex() {
    const requestData = {
        "action": "superUserIndex",
    };

    ajaxRequest(requestData).then(function (data) {
        const adminContent = document.getElementById('adminContent');
        adminContent.innerHTML = data;

    }).catch(function (err) {
    });
}

function getAdminTextLog() {
    const textLogUrl = window.location.href;
    const match = textLogUrl.match(/\/(\d+)\/?$/);

    if (match && match[1]) {
        const requestData = {
            "action": "superUserPage",
            "page": match[1],
        };

        ajaxRequest(requestData).then(function (data) {
            const adminContent = document.getElementById('adminContent');
            adminContent.innerHTML = data;
    
        }).catch(function (err) {
        });
    } else {
        alert("Unable to complete request!");
    }
}