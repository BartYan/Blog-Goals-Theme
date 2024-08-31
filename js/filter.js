(function($) {
    $(document).ready(function(){
        $(document).on('click', '.filter_item > button', function(e){
            e.preventDefault();

            var category = $(this).data('category');

            $.ajax({
                url: wpAjax.ajaxUrl,
                data: { action: 'filter', category: category },
                type: 'post',
                beforeSend: function(){
                    e.preventDefault();
                    $('.js-filter').addClass( "fade__posts" );
                },
                success: function(result) {
                    $('.js-filter').removeClass( "fade__posts " );
                    $('.js-filter').html(result);
                    //console.log(result);
                },
                error: function(result) {
                    console.warn(result);
                }
            });
        });
    });
})(jQuery);