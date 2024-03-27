function ajaxRequest(requestData) {
    return new Promise(function (resolve, reject) {
        $.ajax({
            type: 'GET',
            url: '/entrypoint.php',
            async: true,
            data: requestData,
            success: function (response) {
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

const requestData = {
    "action": "superUser",
};

ajaxRequest(requestData).then(function (data) {
    const adminContent = document.getElementById('adminContent');
    adminContent.innerHTML = data;

}).catch(function (err) {
    // return false;
});