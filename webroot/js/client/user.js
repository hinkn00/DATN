$('#formLogin button').on('click', function(){
    email = $('#email').val();
    password = $('#password').val();
    _csrfToken = $('input[name=_csrfToken]').val();

    $.ajax({
        url:  "/users/login",
        type: 'post',
        dataType: 'json',
        data: {
            _csrfToken: _csrfToken,
            email: email,
            password: password,
        },
    }).done(function(data){
        location.reload();
    });
});