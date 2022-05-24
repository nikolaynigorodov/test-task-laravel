$(document).ready(function() {
    $("#show-more").on('click', function(){
        var buttonShowMore = $('#show-more');
        var page = buttonShowMore.attr('data-page');
        buttonShowMore.attr('data-page', ++page);
        $.ajax({
            url:base_path + "?page=" + page,
            type:'GET',
            success:function(data){
                buttonShowMore.attr('data-page', page);
                $("#users-table tr:last").after(data.html);
                if( data.html.length === 0 ) {
                    buttonShowMore.addClass('disabled');
                    $('#loading-not-user').toggleClass('visually-hidden visually-show');
                }
            }
        });
    });
});
