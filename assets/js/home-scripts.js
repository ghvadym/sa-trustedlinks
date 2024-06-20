(function($){
    $(document).ready(function() {
        const howWorkSlider = new Swiper('.how_we_work__slider', {
            slidesPerView: 'auto',
            pagination   : {
                el: '.swiper-pagination',
            },
        });
    });
})(jQuery);