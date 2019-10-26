// Logout the user
$("#urs-logout").click(function () {
    $.ajax({
        type: 'GET',
        url: '/api/logout',
        data: {
            access_token: access_token
        },
        dataType: 'text'
    })
        .done(function () {
            window.location.href = '/login';
        });
    return false;
});
