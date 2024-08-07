(function ($) {
    $(document).ready(function () {
        const ajax = tl_ajax.ajaxurl;
        const nonce = tl_ajax.nonce;
        const burgerOpen = $('.header_burger_icon');
        const burgerClose = $('.header_close_icon');
        const header = $('#header');
        const isDesktop = $(window).width() > 1024;

        const pricingSlider = new Swiper('.pricing__slider', {
            slidesPerView       : 'auto',
            spaceBetween        : 24,
            loop                : false,
            keyboard            : true,
            grabCursor          : true,
            disableOnInteraction: true,
            allowTouchMove      : true,
            longSwipes          : false,
            simulateTouch       : true,
            speed               : 1000,
            mousewheel          : {
                forceToAxis: true
            },
            navigation          : {
                nextEl: '.pricing__button_next',
                prevEl: '.pricing__button_prev'
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

        const similarPostsSlider = new Swiper('.similar_posts__slider', {
            slidesPerView: 'auto',
            spaceBetween : 24,
            speed        : 1000,
            mousewheel   : {
                forceToAxis: true
            },
            pagination   : {
                el       : '.similar_posts__pagination',
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

        const testimonialsSlider = new Swiper('.testimonials__slider', {
            slidesPerView       : 5,
            centeredSlidesBounds: true,
            centeredSlides      : true,
            loop                : true,
            speed               : 1000,
            grabCursor          : true,
            keyboard            : true,
            allowTouchMove      : true,
            longSwipes          : false,
            simulateTouch       : true,
            slideToClickedSlide : true,
            autoplay            : {
                delay            : 3000,
                pauseOnMouseEnter: true
            },
            mousewheel          : {
                forceToAxis: true
            },
            navigation          : {
                nextEl: '.testimonials__button_next',
                prevEl: '.testimonials__button_prev'
            },
            breakpoints         : {
                0   : {
                    autoplay     : false,
                    slidesPerView: 1.3,
                    speed        : 500
                },
                768 : {
                    slidesPerView: 3
                },
                1024: {
                    slidesPerView: 5
                },
                1025: {
                    loop      : true,
                    speed     : 1000,
                    mousewheel: {
                        forceToAxis: true
                    },
                    autoplay  : {
                        delay            : 3000,
                        pauseOnMouseEnter: true
                    }
                }
            }
        });

        if (header.length) {
            if ($(document).scrollTop() > 30) {
                header.addClass('_scrolled');
            }

            $(window).scroll(function () {
                if ($(header).hasClass('active-menu')) {
                    header.removeClass('_scrolled');
                } else {
                    if ($(this).scrollTop() > 30) {
                        header.addClass('_scrolled');
                    } else {
                        header.removeClass('_scrolled');
                    }
                }
            });
        }

        $(document).on('click', 'a[href="#"]', function(e) {
            e.preventDefault();
        });

        const logo = $('.header__logo');
        if (logo.length) {
            $(document).on('click', '.header__logo', function(e) {
                $(this).addClass('clicked');
            });
        }

        if (header.length && burgerOpen.length && burgerClose.length) {
            $(document).on('click', '.header_burger_icon, .header_close_icon', function () {
                $(header).removeClass('_scrolled');

                if ($(header).hasClass('active-menu')) {
                    $(header).toggleClass('active-menu');
                    $('html').toggleClass('no-scroll');
                } else {
                    setTimeout(function () {
                        $(header).toggleClass('active-menu');
                        $('html').toggleClass('no-scroll');
                    }, 300 );
                }
            });
        }

        /* Modal Window */
        const modalWindow = $('.modal_window');
        const openModalWindowBtn = $('.popup_open');
        const inputPlan = $('.contact_form__plan');
        if (openModalWindowBtn.length && modalWindow.length) {
            $(document).on('click', '.popup_open', function () {
                const plan = $(this).attr('data-plan');
                $(modalWindow).addClass('active-popup');
                $('html').addClass('no-scroll');
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
                $('html').removeClass('no-scroll');
                if (inputPlan.length) {
                    $(inputPlan).val('');
                }
            });
        }

        const contactFormPopup = document.querySelector('.contact-form-popup');
        if (contactFormPopup.length) {
            contactFormPopup.addEventListener('wpcf7mailsent', function (event) {
                const popup = document.getElementById('tl-contact-form');
                if (popup && popup.classList.contains('active-popup')) {
                    setTimeout(function () {
                        popup.classList.remove('active-popup');
                        $('html').removeClass('no-scroll');
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

        const tableShowMore = $('.table__show_more');
        if (tableShowMore.length) {
            $(document).on('click', '.table__show_more', function () {
                const table = $(this).closest('.table');
                const title = $(this).find('.table__show_more_title');
                const dataTitle = $(this).attr('data-title');
                const currentTitle = $(title).text();

                $(table).toggleClass('full_content');
                $(this).attr('data-title', currentTitle);
                $(title).text(dataTitle);
            });
        }

        const pricingShowMore = $('.pricing__load_more');
        if (pricingShowMore.length) {
            $(document).on('click', '.pricing__load_more', function () {
                const list = $(this).closest('.pricing_item_body').find('.pricing_item__list li.hidden');
                if (!list.length) {
                    return false;
                }

                $(list).removeClass('hidden');
                $(this).remove();
            });
        }

    });
})(jQuery);