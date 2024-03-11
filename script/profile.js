
const requestData = {
    "action": "profile"
};

$.ajax({
    type: 'GET',
    url: 'entrypoint.php',
    async: true,
    data: requestData,
    success: function (response) {
        const userId = document.getElementById('userId');
        userId.innerHTML = "User ID = " + response;
    },
    error: function (xhr, status, error) {
        alert("Unable to complete request!");
    }
});

function logOut(){

    const requestData = {
        "action": "logout"
    };
    
    $.ajax({
        type: 'GET',
        url: 'entrypoint.php',
        async: true,
        data: requestData,
        success: function (response) {
        },
        error: function (xhr, status, error) {
            alert("Unable to complete request!");
        }
    });

}