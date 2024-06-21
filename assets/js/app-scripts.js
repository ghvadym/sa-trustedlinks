(function ($) {
    $(document).ready(function () {
        const ajax = sa_ajax.ajaxurl;
        const nonce = sa_ajax.nonce;
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
                if ($(this).scrollTop() > 50) {
                    header.addClass('_scrolled');
                } else {
                    header.removeClass('_scrolled');
                }
            });
        }

        if (header.length && burgerOpen.length && burgerClose.length) {
            $(document).on('click', '.header_burger_icon, .header_close_icon', function () {
                $(header).toggleClass('active-menu');
            });
        }
    });
})(jQuery);