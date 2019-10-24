// Logout the user
$("#urs-logout").click(function () {
    console.log("not implemented");

    axios.get('/api/logout', {
        params: {
            ID: 12345
        }
    })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        })
        .finally(function () {
            // always executed
        });
    return false;
});
