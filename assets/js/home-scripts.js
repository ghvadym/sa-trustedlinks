(function($){
    $(document).ready(function() {
        const isDesktop = $(window).width() > 1024;

        const howWorkSlider = new Swiper('.how_we_work__slider', {
            slidesPerView       : 'auto',
            spaceBetween        : 24,
            loop                : false,
            keyboard            : true,
            grabCursor          : true,
            disableOnInteraction: true,
            allowTouchMove      : true,
            longSwipes          : false,
            simulateTouch       : true,
            slideToClickedSlide : true,
            mousewheel          : {
                forceToAxis: true
            },
            pagination          : {
                el       : '.how_we_work__pagination',
                clickable: true
            },
        });

        const servicesSlider = new Swiper('.services__slider', {
            slidesPerView       : 'auto',
            spaceBetween        : 24,
            loop                : false,
            keyboard            : true,
            grabCursor          : true,
            disableOnInteraction: true,
            allowTouchMove      : true,
            longSwipes          : false,
            simulateTouch       : true,
            slideToClickedSlide : true,
            mousewheel          : {
                forceToAxis: true
            },
            pagination          : {
                el       : '.services__pagination',
                clickable: true
            },
        });

        const prServiceSlider = new Swiper('.pr_service__slider', {
            slidesPerView       : 'auto',
            spaceBetween        : 24,
            loop                : false,
            keyboard            : true,
            grabCursor          : true,
            disableOnInteraction: true,
            allowTouchMove      : true,
            longSwipes          : false,
            simulateTouch       : true,
            slideToClickedSlide : true,
            mousewheel          : {
                forceToAxis: true
            },
            pagination          : {
                el       : '.pr_service__pagination',
                clickable: true
            },
        });

        const blogSlider = new Swiper('.blog__slider', {
            slidesPerView: 'auto',
            spaceBetween : 24,
            mousewheel   : {
                forceToAxis: true
            },
            pagination   : {
                el       : '.blog__pagination',
                clickable: true
            },
            breakpoints  : {
                1025: {
                    loop : true
                }
            }
        });
    });
})(jQuery);