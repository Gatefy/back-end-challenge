// Logout the user
$("#urs-login").click(function () {
    console.log("not implemented");

    axios.post('/api/login', {
        email: $('#inputEmail').val(),
        password: $('#inputPassword').val(),
        remember_me: $('#checkRememberMe')[0].checked
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
