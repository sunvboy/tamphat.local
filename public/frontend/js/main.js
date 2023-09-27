$(".js-header-search").click(function () {
    $(".evo_sidebar_search,.backdrop__body-backdrop___1rvky").toggleClass(
        "active"
    );
});
$(document).on(
    "click",
    ".backdrop__body-backdrop___1rvky, .evo-close-menu, .cart_btn-close, .search_close,.offcanvas-close",
    function (e) {
        $(
            ".mobile-main-menu, .cart_sidebar, .evo_sidebar_search,#offcanvas-cart,.backdrop__body-backdrop___1rvky"
        ).removeClass("active");
    }
);
$(".tp-cart").click(function () {
    $("#offcanvas-cart,.backdrop__body-backdrop___1rvky").removeClass("hidden");
    $("#offcanvas-cart,.backdrop__body-backdrop___1rvky").addClass("active");
});

// click filter
// mobile Slide menu jquery
jQuery(".click-filter").click(function () {
    jQuery(".main-menu-filter").toggleClass("active");
    jQuery("body").toggleClass("menu-change");
    jQuery(".overlay-main").toggleClass("active");
});
jQuery(".overlay-main").click(function () {
    jQuery(".main-menu-filter").removeClass("active");
    jQuery("body").removeClass("menu-change");
    jQuery(".overlay-main").removeClass("active");
});
jQuery(".top-close-menu").click(function () {
    jQuery(".main-menu-filter").removeClass("active");
    jQuery("body").removeClass("menu-change");
    jQuery(".overlay-main").removeClass("active");
});

jQuery(".main-menu-filter ul li").each(function () {
    jQuery(this)
        .children("ul")
        .before(
            '<span class="sub"><i class="fa fa-angle-down" aria-hidden="true"></i></span>'
        );
});
jQuery(".main-menu-filter ul li .sub").click(function (e) {
    jQuery(this).next("ul").slideToggle();

    jQuery(this).toggleClass("submenu-hide");
});

// mobile Slide menu jquery
jQuery(".category-fix-left").click(function () {
    jQuery(".nav-category-mobile").toggleClass("active");
    jQuery("body").toggleClass("menu-change");
    jQuery(".overlay-main-1").toggleClass("active");
});
jQuery(".overlay-main-1").click(function () {
    jQuery(".nav-category-mobile").removeClass("active");
    jQuery("body").removeClass("menu-change");
    jQuery(".overlay-main-1").removeClass("active");
});
jQuery(".top-close-menu").click(function () {
    jQuery(".nav-category-mobile").removeClass("active");
    jQuery("body").removeClass("menu-change");
    jQuery(".overlay-main-1").removeClass("active");
});

// mobile menu jquery

jQuery(".main-menu-mobile ul li").each(function () {
    jQuery(this)
        .children("ul")
        .before(
            '<span class="sub"><i class="fa fa-angle-down" aria-hidden="true"></i></span>'
        );
});
jQuery(".main-menu-mobile ul li .sub").click(function (e) {
    jQuery(this).next("ul").slideToggle();

    jQuery(this).toggleClass("submenu-hide");
});

$("a.btn-support").click(function (e) {
    e.stopPropagation();
    $(".support-content").slideToggle();
});
$(".support-content").click(function (e) {
    e.stopPropagation();
});
$(document).click(function () {
    $(".support-content").slideUp();
});

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $("#scrollUp").fadeIn();
        } else {
            $("#scrollUp").fadeOut();
        }
    });
    $("#scrollUp").click(function () {
        $("body,html").animate({ scrollTop: 0 }, 800);
    });
});

$("#slider-home").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: false,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 1500,
    // navText: [
    //     '<i class="fa fa-chevron-left"></i>',
    //     '<i class="fa fa-chevron-right"></i>',
    // ],
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 1,
        },
    },
});
// $(".count").each(function () {
//     $(this)
//         .prop("Counter", 0)
//         .animate(
//             {
//                 Counter: $(this).text(),
//             },
//             {
//                 duration: 4000,
//                 easing: "swing",
//                 step: function (now) {
//                     $(this).text(Math.ceil(now));
//                 },
//             }
//         );
// });

/* jQuery
================================================== */

$(".slider-logo").owlCarousel({
    loop: true,
    margin: 15,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 1500,
    navText: [
        '<i class="fa fa-chevron-left"></i>',
        '<i class="fa fa-chevron-right"></i>',
    ],
    responsive: {
        0: {
            items: 2,
        },
        600: {
            items: 4,
        },
        1000: {
            items: 9,
        },
    },
});

$(".click-mobile-search").click(function () {
    $(".nav-search-mobile").slideToggle();
});

$(".slider-other-new").owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 1500,
    navText: [
        '<i class="fa fa-chevron-left"></i>',
        '<i class="fa fa-chevron-right"></i>',
    ],
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 3,
        },
    },
});

$(document).ready(function () {
    $(".product-home ul.tabs li").on("click", function () {
        // get the data attribute
        var tab_id = $(this).attr("data-tab");
        // remove the default classes
        $(".product-home ul.tabs li").removeClass("current");
        $(".product-home .tab-content").removeClass("current");
        // add new classes on mouse click
        $(this).addClass("current");
        $("#" + tab_id).addClass("current");
    });
});

$(".slider-product").owlCarousel({
    loop: false,
    margin: 2,
    nav: true,
    navText: [
        '<i class="fa fa-chevron-left"></i>',
        '<i class="fa fa-chevron-right"></i>',
    ],
    dots: true,
    responsive: {
        0: {
            items: 2,
        },
        600: {
            items: 3,
        },
        1000: {
            items: 4,
        },
    },
});

// $(".header-pc").sticky({ topSpacing: 0 });

// $(".header-mobile").sticky({ topSpacing: 0 });

$(document).ready(function () {
    $("ul.tabs li").click(function () {
        var tab_id = $(this).attr("data-tab");

        $("ul.tabs li").removeClass("current");
        $(".tab-content").removeClass("current");

        $(this).addClass("current");
        $("#" + tab_id).addClass("current");
    });
});
$(window).scroll(function () {
    if ($(this).scrollTop() > 1) {
        $(".ads-right-1").addClass("sticky");
    } else {
        $(".ads-right-1").removeClass("sticky");
    }
});
$(window).scroll(function () {
    if ($(this).scrollTop() > 1) {
        $(".category-fix-left").addClass("sticky");
    } else {
        $(".category-fix-left").removeClass("sticky");
    }
});

/* jQuery
================================================== */
$(function () {
    $(".acc__title").click(function (j) {
        var dropDown = $(this).closest(".acc__card").find(".acc__panel");
        $(this).closest(".acc").find(".acc__panel").not(dropDown).slideUp();

        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
        } else {
            $(this)
                .closest(".acc")
                .find(".acc__title.active")
                .removeClass("active");
            $(this).addClass("active");
        }

        dropDown.stop(false, true).slideToggle();
        j.preventDefault();
    });
});
