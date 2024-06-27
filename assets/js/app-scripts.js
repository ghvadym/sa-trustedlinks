(function ($) {
    $(document).ready(function () {
        const ajax = tl_ajax.ajaxurl;
        const nonce = tl_ajax.nonce;
        const burgerOpen = $('.header_burger_icon');
        const burgerClose = $('.header_close_icon');
        const header = $('#header');
        const isDesktop = $(window).width() > 1024;

        const pricingSlider = new Swiper('.pricing__slider', {
            slidesPerView: 'auto',
            navigation: {
                nextEl: '.pricing__button_next',
                prevEl: '.pricing__button_prev'
            },
        });

        const similarPostsSlider = new Swiper('.similar_posts__slider', {
            slidesPerView: 'auto',
            pagination   : {
                el       : '.similar_posts__pagination',
                clickable: true
            },
        });

        const testimonialsSlider = new Swiper('.testimonials__slider', {
            slidesPerView : 'auto',
            grabCursor    : true,
            centeredSlides: true,
            effect        : 'coverflow',
            keyboard      : true,
            spaceBetween  : 50,
            loop: true,
            // autoplay: {
            //     delay: 2000,
            //     disableOnInteraction: false,
            // },
            coverflowEffect: {
                rotate      : 0,
                stretch     : 0,
                depth       : 10,
                modifier    : 14,
                slideShadows: false
            },
            navigation: {
                nextEl: '.testimonials__button_next',
                prevEl: '.testimonials__button_prev',
            },
        });

        if (header.length) {
            $(window).scroll(function () {
                if ($(header).hasClass('active-menu')) {
                    header.removeClass('_scrolled');
                } else {
                    if ($(this).scrollTop() > 50) {
                        header.addClass('_scrolled');
                    } else {
                        header.removeClass('_scrolled');
                    }
                }
            });
        }

        if (header.length && burgerOpen.length && burgerClose.length) {
            $(document).on('click', '.header_burger_icon, .header_close_icon', function () {
                $(header).removeClass('_scrolled');

                if ($(header).hasClass('active-menu')) {
                    $(header).toggleClass('active-menu');
                } else {
                    setTimeout(function () {
                        $(header).toggleClass('active-menu');
                    }, 300 );
                }
            });
        }

        /* Modal Window */
        const modalWindow = $('.modal_window');
        const openModalWindowBtn = $('.popup_open');
        const inputPlan = $(".contact-form input[name='plan']");
        if (openModalWindowBtn.length && modalWindow.length) {
            $(document).on('click', '.popup_open', function () {
                const plan = $(this).attr('data-plan');
                $(modalWindow).addClass('active-popup');
                if (inputPlan.length) {
                    $(inputPlan).val(plan);
                }
            });
        }

        const modalWindowBg = $('.modal_window__bg');
        const modalWindowCloseIcon = $('.modal_window__icon_close');
        if ((modalWindowBg.length || modalWindowCloseIcon.length) && modalWindow.length) {
            $(document).on('click', '.modal_window__bg, .modal_window__icon_close', function () {
                $(modalWindow).removeClass('active-popup');
                if (inputPlan.length) {
                    $(inputPlan).val('');
                }
            });
        }

        const copy = $('.copy_url');
        if (copy.length) {
            $(document).on('click', '.copy_url', function () {
                copyToClipboard($(this));

                $(copy).addClass('active');
                $(copy).append('<span>Copied!</span>');

                setTimeout(function () {
                    $(copy).removeClass('active');
                }, 1500 );

                setTimeout(function () {
                    $(copy).find('span').remove();
                }, 2000 );
            });
        }

        function copyToClipboard(element)
        {
            let temp = $('<input>');
            $('body').append(temp);
            temp.val($(element).attr('data-copy')).select();
            document.execCommand('copy');
            temp.remove();
        }
    });
})(jQuery);