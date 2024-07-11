(function($){
    $(document).ready(function() {
        const isDesktop = $(window).width() > 1024;
        const isSliderWidthAllowed = $(window).width() < 1180;

        if (isSliderWidthAllowed) {
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
                speed               : 1000,
                mousewheel          : {
                    forceToAxis: true
                },
                pagination          : {
                    el       : '.how_we_work__pagination',
                    clickable: true
                },
                breakpoints  : {
                    0   : {
                        speed : 500
                    },
                    1025: {
                        spaceBetween: 18,
                        speed       : 1000
                    }
                }
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
                speed               : 1000,
                mousewheel          : {
                    forceToAxis: true
                },
                pagination          : {
                    el       : '.services__pagination',
                    clickable: true
                },
                breakpoints  : {
                    0   : {
                        speed : 500
                    },
                    1025: {
                        spaceBetween: 18,
                        speed       : 1000
                    }
                }
            });
        }

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
            speed               : 1000,
            mousewheel          : {
                forceToAxis: true
            },
            pagination          : {
                el       : '.pr_service__pagination',
                clickable: true
            },
            breakpoints: {
                0   : {
                    speed: 500
                },
                1025: {
                    speed: 1000
                }
            }
        });

        const blogSlider = new Swiper('.blog__slider', {
            slidesPerView: 'auto',
            spaceBetween : 24,
            speed        : 1000,
            mousewheel   : {
                forceToAxis: true
            },
            pagination   : {
                el       : '.blog__pagination',
                clickable: true
            },
            breakpoints  : {
                0   : {
                    speed: 500
                },
                1025: {
                    loop : true,
                    speed: 1000
                }
            }
        });
    });
})(jQuery);