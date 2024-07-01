(function ($) {
    $(document).ready(function () {
        const ajax = tl_ajax.ajaxurl;
        const nonce = tl_ajax.nonce;
        const burgerOpen = $('.header_burger_icon');
        const burgerClose = $('.header_close_icon');
        const header = $('#header');
        const isDesktop = $(window).width() > 1024;

        let pricingSliderArgs = {
            slidesPerView: 'auto',
            navigation: {
                nextEl: '.pricing__button_next',
                prevEl: '.pricing__button_prev'
            }
        };
        if (isDesktop) {
            pricingSliderArgs.keyboard = true;
            pricingSliderArgs.grabCursor = true;
            pricingSliderArgs.loop = true;
            pricingSliderArgs.pauseOnMouseEnter = true;
            pricingSliderArgs.disableOnInteraction = true;
            pricingSliderArgs.autoplay = {
                delay: 3000,
                disableOnInteraction: false
            };
        }
        const pricingSlider = new Swiper('.pricing__slider', pricingSliderArgs);

        const similarPostsSlider = new Swiper('.similar_posts__slider', {
            slidesPerView: 'auto',
            pagination   : {
                el       : '.similar_posts__pagination',
                clickable: true
            },
        });

        let testimonialsSliderArgs = {
            slidesPerView : 'auto',
            allowTouchMove: true,
            navigation: {
                nextEl: '.testimonials__button_next',
                prevEl: '.testimonials__button_prev'
            }
        };

        if (isDesktop) {
            testimonialsSliderArgs.centeredSlides = true;
            testimonialsSliderArgs.keyboard = true;
            testimonialsSliderArgs.grabCursor = true;
            testimonialsSliderArgs.loop = true;
            testimonialsSliderArgs.pauseOnMouseEnter = true;
            testimonialsSliderArgs.disableOnInteraction = true;
            testimonialsSliderArgs.autoplay = {
                delay: 3000,
                disableOnInteraction: false
            };
        }

        const testimonialsSlider = new Swiper('.testimonials__slider', testimonialsSliderArgs);

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

        const contactFormPopup = document.querySelector('.contact-form-popup');
        if (contactFormPopup.length) {
            contactFormPopup.addEventListener('wpcf7mailsent', function (event) {
                const popup = document.getElementById('tl-contact-form');
                if (popup.length && popup.classList.contains('active-popup')) {
                    setTimeout(function () {
                        popup.classList.remove('active-popup');
                    }, 2000 );
                }
            }, false);
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