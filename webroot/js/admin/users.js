$().ready(function(){
    //check validator
    $('#frmAdd').validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "name" : {
                required : true,
                maxlength: 50
            },
            "email" : {
                required : true,
                email : true
            },
            'password' : {
                minlength: 8,
                maxlength: 32,
                required : true,
            },
            'role' : {
                'required': true
            },
            'img_avatar' : {
                required: true,
                extension: "png|jpeg|jpg",
                filesize: 1048576
            }
        },
        messages: {
            "name": {
                required: "Tên khách hàng không được để trống",
                maxlength: "Nhập tối đa 50 ký tự"
            },
            "email" : {
                required: "Email không được để trống",
                email: "Email sủ dụng không đúng định dạng *@*.*"
            },
            'password' : {
                minlength: "Mật khẩu ít nhất phải 8 ký tự trở lên",
                maxlength: "Mật khẩu tối đa 32 ký tự trở xuống",
                required: "Không bỏ trống mật khẩu",
            },
            'role' : {
                required: "Chưa chọn quyền cho tài khoản",
            },
            'img_avatar' : {
                required: "Hãy chọn avatar cho tài khoản",
                extension: "Avatar là hình ảnh có định dạng png|jpeg|jpg",
                filesize: "Dung lượng không vượt quá 1MB"
            }
        },
        submitHandler: function (form) {
            form.submit();
        },
    })
})

//Add file image
$(".files").attr('data-before', "Kéo thả ảnh tại đây hoặc chọn ảnh bỏ vào");
$('input[type="file"]').change(function (e) {
    var fileName = e.target.files[0].name;
    $(".files").attr('data-before', fileName);

});

$('#file').change(function () {
    var fileImg = $('input#file').val();
    if (fileImg != '') {
        // $display = `
        //             <div class="form-group" id="show-img">
        //                 <p><strong>Ảnh xem trước</strong></p>
        //                 <img src="${URL.createObjectURL(event.target.files[0])}" style="border-radius: 50%; border: 1px solid #ddd; width: 100px; height: 100px; margin-bottom:5px; margin-right:5px"/>
        //             </div>
        //         `;
        $('.box-pre-img').removeClass('hidden');
        $('.box-pre-img').addClass('form-group');
        // $('.box-pre-img').append($display)
        $('.box-pre-img').html(`<p><strong>Ảnh xem trước</strong></p>`)
        $('.box-pre-img').append(`<img src="${URL.createObjectURL(event.target.files[0])}" class="show_img_append"/>`)
    }
})

//random password
function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}
$('#password').attr('value',makeid(12))