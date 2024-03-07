(function ($) {
    "use strict";

    /* 1. Proloder */
    $(window).on("load", function () {
        $("#preloader-active").delay(450).fadeOut("slow");
        $("body").delay(450).css({
            overflow: "visible",
        });
    });

    /**
     * 2. Animation on scroll
     */
    window.addEventListener("load", () => {
        AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true,
            mirror: false,
        });
    });

    /* 3. slick Nav */
    // mobile_menu
    var menu = $("ul#navigation");
    if (menu.length) {
        menu.slicknav({
            prependTo: ".mobile_menu",
            closedSymbol: "+",
            openedSymbol: "-",
        });
    }


    /* 4. Testimonial Active*/
    var testimonial = $(".h1-testimonial-active");
    if (testimonial.length) {
        testimonial.slick({
            dots: true,
            infinite: true,
            speed: 1000,
            autoplay: true,
            loop: true,
            arrows: true,
            prevArrow:
                '<button type="button" class="slick-prev"><i class="ti-arrow-top-left"></i></button>',
            nextArrow:
                '<button type="button" class="slick-next"><i class="ti-arrow-top-right"></i></button>',
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true,
                        arrow: true,
                    },
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrow: true,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrow: true,
                    },
                },
            ],
        });
    }

})(jQuery);
