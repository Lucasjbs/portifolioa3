const requestData = {
    "action": "logout"
};

$.ajax({
    type: 'GET',
    url: '/entrypoint.php',
    async: true,
    data: requestData,
    success: function (response) {
        window.location.href = "/";
    },
    error: function (xhr, status, error) {
    }
});