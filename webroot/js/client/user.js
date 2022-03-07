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

//get api cities
$ajax_api_cities = $.ajax({
    url: 'http://mr80.net/files/2015/09/vietnam_provinces_cities.json',
    type:'get',
    dataType: 'json',
    success: function(data){
        doneFunc(data)
    }
})

var doneFunc = function(data){
    //get list city
    const name_city = $.each(data, (i, item)=>{
        $("#country").append($('<option/>',{
            value: i,
            text: item.name
        }));
    });

    //get list district to city
    //tối fix
    // const name_district = $.each(data, (i, item)=>{
    //     let name_city_select = $("#country").find(":selected").text();
    //     console.log(name_city_select);
    //     if(i == name_city_select){
    //         $.each(item.cities, (k, item2)=>{
    //             $("#city").append($('<option/>',{
    //                 value: k,
    //                 text: item2
    //             }));
    //         })
    //         $('#country').change(function(){
    //             if(i == name_city_select){
    //                 $.each(item.cities, (k, item2)=>{
    //                     $("#city")
    //                     .find('option')
    //                     .remove()
    //                     .append($('<option/>',{
    //                         value: k,
    //                         text: item2
    //                     }));
    //                 })
    //             }
    //         })
    //     }
    // })
}