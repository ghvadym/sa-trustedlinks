(function($){
    $(document).ready(function() {
        const ajax = tl_ajax.ajaxurl;
        const nonce = tl_ajax.nonce;

        const mostPopularSlider = new Swiper('.most_popular__slider', {
            slidesPerView: 'auto',
            spaceBetween : 24,
            pagination   : {
                el       : '.most_popular__pagination',
                clickable: true
            },
        });

        const btnViewAll = $('.recent_posts__btn');
        const resetFilter = $('.recent_posts__close');
        const blogTabs = $('.recent_posts__cat');
        if (blogTabs.length) {
            $(document).on('click', '.recent_posts__cat', function () {
                const cat = $(this);
                const id = $(cat).attr('data-id');
                const link = $(cat).attr('data-link');

                if ($(cat).hasClass('active-cat')) {
                    return false;
                }

                $(blogTabs).removeClass('active-cat');
                $(cat).addClass('active-cat');
                $(resetFilter).show();

                if (btnViewAll.length && link) {
                    $(btnViewAll).show().attr('href', link);
                }

                postsFilter(id);
            });
        }

        if (resetFilter.length) {
            $(document).on('click', '.recent_posts__close', function () {
                $(resetFilter).hide();
                $(blogTabs).removeClass('active-cat');
                $(btnViewAll).hide();
                postsFilter();
            });
        }

        function postsFilter(id = '')
        {
            const wrap = $('.recent_posts__list');

            $.ajax({
                type: 'POST',
                url : ajax,
                data: {
                    action : 'posts_filter',
                    nonce  : nonce,
                    term_id: id
                },
                beforeSend : function () {
                    $(wrap).addClass('_spinner');
                },
                success: function (response) {
                    if (response.posts) {
                        $(wrap).html(response.posts);
                    }

                    $(wrap).removeClass('_spinner');
                },
                error: function (err) {
                    console.log('error', err);
                }
            });
        }

    });
})(jQuery);