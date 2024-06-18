(function ($) {
    $(document).ready(function () {
        const ajax = sa_ajax.ajaxurl;
        const nonce = sa_ajax.nonce;
        const burgerOpen = $('.header_burger_icon');
        const burgerClose = $('.header_close_icon');
        const header = $('#header');
        const isDesktop = $(window).width() > 1024;

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