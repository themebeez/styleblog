(function($) {

    "use strict";

    jQuery(document).ready(function() {


        // init retina 

        retinajs();

        // Init nice select for select & dropdowns

        $('select').niceSelect();


        // init primary

        $('#site-navigation').stellarNav({

            theme: 'light',
            breakpoint: 991,
            closeBtn: false,
            scrollbarFix: true,
            sticky: false,
        });

        $('.search-button').click(function(e) {
            e.preventDefault();
            $('.search-container').slideToggle();
        });

        $('.search-container .search-form .search-field').removeAttr('placeholder');


        // init Featured post slider 

        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: true,
            speed: 400,
            effect: "slide",
            pagination: false,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        // Hover pause swiper 

        $(".swiper-container").hover(function() {
            swiper.autoplay.stop();
        }, function() {
            swiper.autoplay.start();
        });


        // init related posts carousel

        $('.related_posts_carousel').owlCarousel({
            loop: true,
            margin: 2.5,
            nav: true,
            rtl: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            }
        });


        // init feed carousel  

        $('.feed-carousel').owlCarousel({
            items: 6,
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                370: {
                    items: 1
                },
                450: {
                    items: 2
                },
                768: {
                    items: 4
                },
                992: {
                    items: 6
                },
                1200: {
                    items: 6
                }
            }
        });

    });



    // init sticky sidebar

    jQuery('.sticky_portion').theiaStickySidebar({
        additionalMarginTop: 0
    });



    // Scroll Top


    jQuery(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {
            $('#return-to-top').fadeIn(200); // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200); // Else fade out the arrow
        }
    });

    jQuery('#return-to-top').click(function() { // When arrow is clicked
        jQuery('body, html').animate({
            scrollTop: 0 // Scroll to top of body
        }, 1000);
    });

})(jQuery);