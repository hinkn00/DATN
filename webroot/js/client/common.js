$(function(){
    // let placeholder = getPlaceHolerSearch();
    // $('input[name=tag_key]#tags').attr('placeholder', placeholder);

    // $('#search-menu').on('change keyup blur', function() {
    //     let select = $(this).val();

    //     var placeholder = getPlaceHolerSearch(select);
    //     $('input[name=tag_key]#tags').attr('placeholder', placeholder);
    // });
    
    $('input[name=tag_key]#tags').on('change keyup blur', function(){
        let key_tag = $(this).val();
        if(key_tag === undefined || key_tag.trim() === ''){
            $('.btn-search--movie').attr("disabled", "disabled");
            $('.btn-search--movie .search-icon').removeClass('hidden');
            $('.btn-search--movie .loading-icon').addClass('hidden');
        }else{
            $('.btn-search--movie').removeAttr("disabled")
        }


        $("#tags").autocomplete({
            source: function(request, response){
                $.ajax({
                    url: `/ajaxListMovies?query=${$('input[name=tag_key]#tags').val()}`,
                    type:'get',
                    dataType: 'json',
                    beforeSend: function(){
                        $('.btn-search--movie .search-icon').addClass('hidden');
                        $('.btn-search--movie .loading-icon').removeClass('hidden');
                    },
                    success: function(data){
                        setTimeout(function(){
                            $('.btn-search--movie .search-icon').removeClass('hidden');
                            $('.btn-search--movie .loading-icon').addClass('hidden');
                        },500)
                        response(data.array_data)
                    }
                });
            },
            delay: 500,
            minLength: 1,
            // select: function(event, response){
            //     $('#search_data').val(response.item.value);
            // }
            select: function(event, ui) {   
                location.href= location.origin+'/search?tag_key='+ui.item.value
            }
        }).focus(function() {
            $(this).autocomplete("search", "");
        });
        // .data("ui-autocomplete")._renderItem = function (ul, item) {
        //     return $("<li class='ui-autocomplete-row'></li>")
        //         .data("item.autocomplete", item)
        //         .append(item.label)
        //         .appendTo(ul)
        // };
    });

    
});

// function getPlaceHolerSearch(search = 'category') {
//     let placeholder = '';
//     switch (search) {
//         case 'category':
//             placeholder = 'Nhập tên phim để tìm kiếm theo danh mục';
//             break;
//         case 'genre':
//             placeholder = 'Nhập tên phim để tìm kiếm theo thể loại';
//             break;
//         case 'country':
//             placeholder = 'Nhập tên phim để tìm kiếm theo quốc gia';
//             break;
//         default:
//             placeholder = 'Nhập tên phim để tìm kiếm'
//             break;
//     }

//     return placeholder;
// }