(function(e){e(document).ready(function(){tl_ajax.ajaxurl,tl_ajax.nonce;const p=e(".header_burger_icon"),u=e(".header_close_icon"),n=e("#header"),r=e(window).width()>1024;let o={slidesPerView:"auto",navigation:{nextEl:".pricing__button_next",prevEl:".pricing__button_prev"}};r&&(o.keyboard=!0,o.grabCursor=!0,o.loop=!0,o.pauseOnMouseEnter=!0,o.disableOnInteraction=!0,o.autoplay={delay:3e3,disableOnInteraction:!1}),new Swiper(".pricing__slider",o),new Swiper(".similar_posts__slider",{slidesPerView:"auto",pagination:{el:".similar_posts__pagination",clickable:!0}});const i={slidesPerView:"auto",navigation:{nextEl:".testimonials__button_next",prevEl:".testimonials__button_prev"}};r&&(i.centeredSlides=!0,i.keyboard=!0,i.grabCursor=!0,i.loop=!0,i.autoplay={delay:3e3,disableOnInteraction:!1}),new Swiper(".testimonials__slider",i),n.length&&e(window).scroll(function(){e(n).hasClass("active-menu")?n.removeClass("_scrolled"):e(this).scrollTop()>50?n.addClass("_scrolled"):n.removeClass("_scrolled")}),n.length&&p.length&&u.length&&e(document).on("click",".header_burger_icon, .header_close_icon",function(){e(n).removeClass("_scrolled"),e(n).hasClass("active-menu")?e(n).toggleClass("active-menu"):setTimeout(function(){e(n).toggleClass("active-menu")},300)});const a=e(".modal_window"),_=e(".popup_open"),s=e(".contact-form input[name='plan']");_.length&&a.length&&e(document).on("click",".popup_open",function(){const c=e(this).attr("data-plan");e(a).addClass("active-popup"),s.length&&e(s).val(c)});const m=e(".modal_window__bg"),g=e(".modal_window__icon_close");(m.length||g.length)&&a.length&&e(document).on("click",".modal_window__bg, .modal_window__icon_close",function(){e(a).removeClass("active-popup"),s.length&&e(s).val("")});const d=document.querySelector(".contact-form-popup");d.length&&d.addEventListener("wpcf7mailsent",function(c){const t=document.getElementById("tl-contact-form");t.length&&t.classList.contains("active-popup")&&setTimeout(function(){t.classList.remove("active-popup")},2e3)},!1);const l=e(".copy_url");l.length&&e(document).on("click",".copy_url",function(){f(e(this)),e(l).addClass("active"),e(l).append("<span>Copied!</span>"),setTimeout(function(){e(l).removeClass("active")},1500),setTimeout(function(){e(l).find("span").remove()},2e3)});function f(c){let t=e("<input>");e("body").append(t),t.val(e(c).attr("data-copy")).select(),document.execCommand("copy"),t.remove()}})})(jQuery);
