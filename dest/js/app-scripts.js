(function(e){e(document).ready(function(){tl_ajax.ajaxurl,tl_ajax.nonce;const c=e(".header_burger_icon"),r=e(".header_close_icon"),o=e("#header");e(window).width()>1024,new Swiper(".pricing__slider",{slidesPerView:"auto",spaceBetween:24,loop:!1,keyboard:!0,grabCursor:!0,disableOnInteraction:!0,allowTouchMove:!0,longSwipes:!1,simulateTouch:!0,slideToClickedSlide:!0,mousewheel:{forceToAxis:!0},navigation:{nextEl:".pricing__button_next",prevEl:".pricing__button_prev"}}),new Swiper(".similar_posts__slider",{slidesPerView:"auto",spaceBetween:24,mousewheel:{forceToAxis:!0},pagination:{el:".similar_posts__pagination",clickable:!0}}),new Swiper(".testimonials__slider",{slidesPerView:4,center:!0,spaceBetween:24,allowTouchMove:!0,longSwipes:!1,simulateTouch:!0,slideToClickedSlide:!0,centeredSlides:!0,pauseOnMouseEnter:!0,loop:!0,mousewheel:{forceToAxis:!0},navigation:{nextEl:".testimonials__button_next",prevEl:".testimonials__button_prev"},breakpoints:{0:{slidesPerView:1.2},768:{slidesPerView:3},1024:{slidesPerView:4,keyboard:!0,grabCursor:!0},1025:{loop:!0,autoplay:{delay:3e3,disableOnInteraction:!1}}}}),o.length&&e(window).scroll(function(){e(o).hasClass("active-menu")?o.removeClass("_scrolled"):e(this).scrollTop()>50?o.addClass("_scrolled"):o.removeClass("_scrolled")}),o.length&&c.length&&r.length&&e(document).on("click",".header_burger_icon, .header_close_icon",function(){e(o).removeClass("_scrolled"),e(o).hasClass("active-menu")?e(o).toggleClass("active-menu"):setTimeout(function(){e(o).toggleClass("active-menu")},300)});const i=e(".modal_window"),u=e(".popup_open"),l=e(".contact-form input[name='plan']");u.length&&i.length&&e(document).on("click",".popup_open",function(){const s=e(this).attr("data-plan");e(i).addClass("active-popup"),l.length&&e(l).val(s)});const d=e(".modal_window__bg"),p=e(".modal_window__icon_close");(d.length||p.length)&&i.length&&e(document).on("click",".modal_window__bg, .modal_window__icon_close",function(){e(i).removeClass("active-popup"),l.length&&e(l).val("")});const a=document.querySelector(".contact-form-popup");a.length&&a.addEventListener("wpcf7mailsent",function(s){const t=document.getElementById("tl-contact-form");t.length&&t.classList.contains("active-popup")&&setTimeout(function(){t.classList.remove("active-popup")},2e3)},!1);const n=e(".copy_url");n.length&&e(document).on("click",".copy_url",function(){_(e(this)),e(n).addClass("active"),e(n).append("<span>Copied!</span>"),setTimeout(function(){e(n).removeClass("active")},1500),setTimeout(function(){e(n).find("span").remove()},2e3)});function _(s){let t=e("<input>");e("body").append(t),t.val(e(s).attr("data-copy")).select(),document.execCommand("copy"),t.remove()}})})(jQuery);
