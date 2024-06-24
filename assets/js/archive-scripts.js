(function($){
    $(document).ready(function() {
        const mostPopularSlider = new Swiper('.most_popular__slider', {
            slidesPerView: 'auto',
            pagination   : {
                el       : '.most_popular__pagination',
                clickable: true
            },
        });
    });
})(jQuery);