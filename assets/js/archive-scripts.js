(function($){
    $(document).ready(function() {
        const ajax = tl_ajax.ajaxurl;
        const nonce = tl_ajax.nonce;

        const mostPopularSlider = new Swiper('.most_popular__slider', {
            slidesPerView : 'auto',
            spaceBetween  : 24,
            speed         : 1000,
            grabCursor    : true,
            keyboard      : true,
            allowTouchMove: true,
            longSwipes    : false,
            mousewheel    : {
                forceToAxis: true
            },
            pagination    : {
                el       : '.most_popular__pagination',
                clickable: true
            },
            breakpoints        : {
                0   : {
                    speed : 500
                },
                1025: {
                    speed : 1000
                }
            }
        });

        const blogTabs = $('.recent_posts__cat');
        if (blogTabs.length) {
            $(document).on('click', '.recent_posts__cat', function () {
                const cat = $(this);
                const id = $(cat).attr('data-id');

                if ($(cat).hasClass('active-cat')) {
                    $(cat).removeClass('active-cat');
                    postsFilter();

                    return false;
                }

                $(blogTabs).removeClass('active-cat');
                $(cat).addClass('active-cat');

                postsFilter(id);
            });
        }

        const navItems = $('.recent_posts__nav a');
        if (navItems.length) {
            $(document).on('click', '.recent_posts__nav a', function (e) {
                e.preventDefault();
                $('.recent_posts__nav').addClass('event-none');

                const hrefItems = $(this).attr('href').match(/\d+/);
                let page = 1;

                if (hrefItems) {
                    page = hrefItems[0]
                }

                const catId = $('.recent_posts__cat.active-cat').data('id');

                postsFilter(catId, page);
            });
        }

        function postsFilter(id = '', page = 1)
        {
            const wrap = $('.recent_posts__list');
            const nav = $('.recent_posts__nav');

            $.ajax({
                type: 'POST',
                url : ajax,
                data: {
                    action : 'posts_filter',
                    nonce  : nonce,
                    term_id: id,
                    page   : page
                },
                beforeSend : function () {
                    $(wrap).addClass('_spinner');
                },
                success: function (response) {
                    if (response.posts) {
                        $(wrap).html(response.posts);
                    }

                    if (response.nav) {
                        $(nav).html(response.nav).removeClass('event-none');
                    } else {
                        $(nav).empty();
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