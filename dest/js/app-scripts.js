(function(e){e(document).ready(function(){tl_ajax.ajaxurl,tl_ajax.nonce;const s=e(".header_burger_icon"),c=e(".header_close_icon"),o=e("#header");e(window).width()>1024,new Swiper(".pricing__slider",{slidesPerView:"auto",navigation:{nextEl:".pricing__button_next",prevEl:".pricing__button_prev"}}),new Swiper(".similar_posts__slider",{slidesPerView:"auto",pagination:{el:".similar_posts__pagination",clickable:!0}}),new Swiper(".testimonials__slider",{slidesPerView:"auto",grabCursor:!0,centeredSlides:!0,effect:"coverflow",keyboard:!0,spaceBetween:50,loop:!0,coverflowEffect:{rotate:0,stretch:0,depth:10,modifier:14,slideShadows:!1},navigation:{nextEl:".testimonials__button_next",prevEl:".testimonials__button_prev"}}),o.length&&e(window).scroll(function(){e(o).hasClass("active-menu")?o.removeClass("_scrolled"):e(this).scrollTop()>50?o.addClass("_scrolled"):o.removeClass("_scrolled")}),o.length&&s.length&&c.length&&e(document).on("click",".header_burger_icon, .header_close_icon",function(){e(o).removeClass("_scrolled"),e(o).hasClass("active-menu")?e(o).toggleClass("active-menu"):setTimeout(function(){e(o).toggleClass("active-menu")},300)});const t=e(".modal_window"),r=e(".popup_open"),i=e(".contact-form input[name='plan']");r.length&&t.length&&e(document).on("click",".popup_open",function(){const l=e(this).attr("data-plan");e(t).addClass("active-popup"),i.length&&e(i).val(l)});const d=e(".modal_window__bg"),p=e(".modal_window__icon_close");(d.length||p.length)&&t.length&&e(document).on("click",".modal_window__bg, .modal_window__icon_close",function(){e(t).removeClass("active-popup"),i.length&&e(i).val("")});const n=e(".copy_url");n.length&&e(document).on("click",".copy_url",function(){_(e(this)),e(n).addClass("active"),e(n).append("<span>Copied!</span>"),setTimeout(function(){e(n).removeClass("active")},1500),setTimeout(function(){e(n).find("span").remove()},2e3)});function _(l){let a=e("<input>");e("body").append(a),a.val(e(l).attr("data-copy")).select(),document.execCommand("copy"),a.remove()}})})(jQuery);
