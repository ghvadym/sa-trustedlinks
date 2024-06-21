(function($){
    $(document).ready(function() {
        const howWorkSlider = new Swiper('.how_we_work__slider', {
            slidesPerView: 'auto',
            pagination   : {
                el       : '.how_we_work__pagination',
                clickable: true
            },
        });

        const prServiceSlider = new Swiper('.pr_service__slider', {
            slidesPerView: 'auto',
            pagination   : {
                el       : '.pr_service__pagination',
                clickable: true
            },
        });
    });
})(jQuery);