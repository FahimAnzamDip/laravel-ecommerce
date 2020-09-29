/*
Template Name: Gatcomart;
Description:  Mega Shop Responsive Ecommerce HTML Template;
Template URI:;
Author Name:Md Bayazid Hasan;
Author URI:;
Version: 1.0;

NOTE: main.js, All custom script and plugin activation script in this file.
*/

/*================================================
[  Table of contents  ]
==================================================

 1. preloader Activation
 2. Newsletter Popup
 3. Mobile Menu Activation
 4. NivoSlider Activation
 5. Footer Banner Slider Activation
 6. New Products Activation
 7. Tooltip Activation
 8. New Products Activation
 9. Thumbnail Product activation
 10. Cart Box Quantity Selection
 11. Elevatezoom Activation
 12. Price Slider Activation
 13. Most Viewd Product activation
 14. Sticky-Menu Activation
 15. Home - 2 Featured Products Activation
 16. WOW Js Activation
 17. Checkout Page Activation
 18. ScrollUp Activation

================================================*/

(function ($) {
    "use Strict";
    /*----------------------------
    1. preloader Activation
    -----------------------------*/
    $(window).load(function () {
        $(".preloader").fadeOut("slow");
    });

    /*--------------------------
    2. Newsletter Popup
    ---------------------------*/
    setTimeout(function () {
        $('.popup_wrapper').css({
            "opacity": "1",
            "visibility": "visible"
        });
        $('.popup_off').on('click', function () {
            $(".popup_wrapper").fadeOut(500);
        })
    }, 2500);

    /*----------------------------
    3. Mobile Menu Activation
    -----------------------------*/
    $('.mobile-menu nav').meanmenu({
        meanScreenWidth: "991",
    });

    /*----------------------------
    4. NivoSlider Activation
    -----------------------------*/
    $('#slider').nivoSlider({
        effect: 'random',
        animSpeed: 300,
        pauseTime: 5000,
        directionNav: true,
        manualAdvance: true,
        controlNavThumbs: false,
        pauseOnHover: true,
        controlNav: true,
        prevText: "<i class='zmdi zmdi-chevron-left'></i>",
        nextText: "<i class='zmdi zmdi-chevron-right'></i>"
    });

    /*----------------------------
    5. Footer Banner Slider Activation
    -----------------------------*/
    $('.banner-slider').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        smartSpeed: 1000,
        margin: 0,
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 3
            },
            768: {
                items: 4
            },
            1000: {
                items: 6
            }
        }
    })

    /*----------------------------
    6. New Products Activation
    -----------------------------*/
    $('.new-products').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        margin: 30,
        navText: ["<i class='fa fa-angle-left'></i>" , "<i class='fa fa-angle-right'></i>"],
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 3
            },
            1170: {
                items: 4
            }
        }
    })

    /*----------------------------
    7. Tooltip Activation
    ------------------------------ */
    $('[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'top',
        container: 'body'
    });

    /*----------------------------
    8. New Products Activation
    -----------------------------*/
    $('.blog').owlCarousel({
        loop: false,
        dots: false,
        autoplay: true,
        margin: 30,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })

    /*-------------------------------------
    9. Thumbnail Product activation
    --------------------------------------*/
    $('.thumb-menu').owlCarousel({
        loop: false,
        navText: ["<i class='fa fa-angle-left'></i>" , "<i class='fa fa-angle-right'></i>"],
        margin: 15,
        smartSpeed: 1000,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 3
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })

    /*----------------------------
    10. Cart Box Quantity Selection
    -----------------------------*/
	 $(".cart-plus-minus").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
	  $(".qtybutton").on("click", function() {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if ($button.text() == "+") {
		  var newVal = parseFloat(oldValue) + 1;
		} else {
		   // Don't allow decrementing below zero
		  if (oldValue > 0) {
			var newVal = parseFloat(oldValue) - 1;
			} else {
			newVal = 0;
		  }
		  }
		$button.parent().find("input").val(newVal);
	  });

    /*----------------------------
    11. Elevatezoom Activation
    -----------------------------*/
    $("#big-img").elevateZoom({
        constrainType: "width",
        containLensZoom: true,
        gallery: 'small-img',
        cursor: 'pointer',
        galleryActiveClass: "active"
    });

    /*----------------------------
    12. Price Slider Activation
    -----------------------------*/
    $("#slider-range").slider({
        range: true,
        min: 80,
        max: 2000,
        values: [0, 2000],
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + "  $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        "  $" + $("#slider-range").slider("values", 1));

    /*-------------------------------------
    13. Most Viewd Product activation
    --------------------------------------*/
    $('.most-viewed-product').owlCarousel({
        loop: false,
        margin: 15,
        smartSpeed: 1000,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

    /*----------------------------
    14. Sticky-Menu Activation
    ------------------------------ */
    $(window).scroll(function () {
        if ($(this).scrollTop() > 40) {
            $('.header-sticky').addClass("sticky");
        } else {
            $('.header-sticky').removeClass("sticky");
        }
    });

    /*-------------------------------------
    15. Home-2 Featured Products Activation
    --------------------------------------*/
    $('.featured-pro').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        margin: 30,
        navText: ["<i class='fa fa-angle-left'></i>" , "<i class='fa fa-angle-right'></i>"],
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            768: {
                items: 3
            },
            1000: {
                items: 4
            },
            1280: {
                items: 5
            },
            1400: {
                items: 6
            }
        }
    })

    /*----------------------------
    16. WOW Js Activation
    -----------------------------*/
    new WOW().init();

    /*----------------------------
    17. Checkout Page Activation
    -----------------------------*/
    $('#showlogin').on('click', function () {
        $('#checkout-login').slideToggle();
    });
     $('#cbox').on('click', function () {
        $('#cbox_info').slideToggle();
    });
     $('#ship-box').on('click', function () {
        $('#ship-box-info').slideToggle();
    });

    /*----------------------------
    18. ScrollUp Activation
    -----------------------------*/
    $.scrollUp({
        scrollName: 'scrollUp', // Element ID
        topDistance: '300', // Distance from top before showing element (px)
        topSpeed: 1000, // Speed back to top (ms)
        animation: 'fade', // Fade, slide, none
        scrollSpeed: 900,
        animationInSpeed: 1000, // Animation in speed (ms)
        animationOutSpeed: 1000, // Animation out speed (ms)
        scrollText: '<i class="fa fa-angle-up" aria-hidden="true"></i>', // Text for element
        activeOverlay: false// Set CSS color to display scrollUp active point, e.g '#00FFFF'
    });

})(jQuery);
