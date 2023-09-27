/*js home slider banner*/
$(".slider-home").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    autoplay: false,
    autoplayTimeout: 5000,
    autoplaySpeed: 1500,
    navText: [
        '<svg focusable="false" width="17" height="14" class="icon icon--nav-arrow-left  icon--direction-aware " viewBox="0 0 17 14"><path d="M17 7H2M8 1L2 7l6 6" stroke="currentColor" stroke-width="2" fill="none"></path></svg>',
        '<svg focusable="false" width="17" height="14" class="icon icon--nav-arrow-right  icon--direction-aware " viewBox="0 0 17 14"><path d="M0 7h15M9 1l6 6-6 6" stroke="currentColor" stroke-width="2" fill="none"></path></svg>',
    ],
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
$(".slider-product").owlCarousel({
    loop: false,
    margin: 0,
    dots: false,
    nav: true,
    autoplay: false,
    autoplayTimeout: 5000,
    autoplaySpeed: 1500,
    navText: [
        '<svg focusable="false" width="17" height="14" class="icon icon--nav-arrow-left  icon--direction-aware " viewBox="0 0 17 14"><path d="M17 7H2M8 1L2 7l6 6" stroke="currentColor" stroke-width="2" fill="none"></path></svg>',
        '<svg focusable="false" width="17" height="14" class="icon icon--nav-arrow-right  icon--direction-aware " viewBox="0 0 17 14"><path d="M0 7h15M9 1l6 6-6 6" stroke="currentColor" stroke-width="2" fill="none"></path></svg>',
    ],
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
