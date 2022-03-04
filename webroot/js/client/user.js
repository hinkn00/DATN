$('#formLogin button').on('click', function(){
    email = $('#email').val();
    password = $('#password').val();
    _csrfToken = $('input[name=_csrfToken]').val();
    console.log(_csrfToken);
    console.log(password);
    $.ajax({
        url:  "/login",
        type: 'post',
        dataType: 'json',
        data: {
            _csrfToken: _csrfToken,
            email: email,
            password: password,
        },
        success : function(result){
            alert(result);
        }
    });
});