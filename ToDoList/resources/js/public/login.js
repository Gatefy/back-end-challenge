// function frm_login() {
//     return $('#frm-login');
// }

$('#frm-login').validationEngine(window.__defaul_validationEngine_options);

if (localStorage.getItem('remember_me') == 1) {
    $('#inputEmail').val(localStorage.getItem('email'));
    $('#checkRememberMe').get(0).checked = true;
}

$('#urs-login').click(function () {
    if ($('#frm-login').validationEngine('validate')) {
        $('.alert-dismissible a.close').click();

        let ajax_data = {
            email: $('#inputEmail').val(),
            password: $('#inputPassword').val(),
            remember_me: ($('#checkRememberMe')[0].checked ? 1 : 0)
        };

        $.ajax({
            type: 'POST',
            url: '/api/login',
            data: {
                email: $('#inputEmail').val(),
                password: $('#inputPassword').val(),
                remember_me: ($('#checkRememberMe')[0].checked ? 1 : 0)
            },
            dataType: 'json'
        })
            .done(function (responseJSON) {
                localStorage.setItem('email', ajax_data.email);
                localStorage.setItem('remember_me', ajax_data.remember_me);
                localStorage.setItem('access_token', responseJSON.access_token);

                window.location.href = '/dashboard?access_token=' + responseJSON.access_token;
            })
            .fail(function (data) {
                var msg = $($('#frm-msg-default').html());
                if (data.responseJSON.message !== 'Unauthorized') {
                    msg.find('.frm-msg').html(data.responseJSON.message);
                }
                $('#frm-login').prepend(msg);
            });
    }

    return false;
});
