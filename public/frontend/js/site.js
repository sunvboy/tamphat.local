jQuery(function ($) {
    // Datepicker
    // ------------------------------------------------------
    var dbook = new Date();
    $(".checkin-date").datepicker({
        minDate: new Date(),
        //changeMonth: true,
        //changeYear: true,
        //showOn: "button",
        //buttonImage: "/images/calendar.png",
        //buttonImageOnly: true,
        numberOfMonths: 1,
        dateFormat: "d M yy",
        onSelect: function (dateStr) {
            var date = $(this).datepicker("getDate");
            if (date) {
                date.setDate(date.getDate() + 1);
            }
            $(".checkout-date")
                .datepicker("option", { minDate: date })
                .datepicker("setDate", date);
        },
    });
    $(".checkin-date").datepicker("setDate", dbook);
    dbook.setDate(dbook.getDate() + 1);

    $(".checkout-date").datepicker({
        minDate: dbook,
        //changeMonth: true,
        //changeYear: true,
        numberOfMonths: 1,
        //showOn: "button",
        //buttonImage: "/images/calendar.png",
        //buttonImageOnly: true,
        dateFormat: "d M yy",
    });
    $(".checkout-date").datepicker("setDate", dbook);

    /**/
    /**/
    var de = new Date();
    $(function () {
        $(".departuredate").datepicker({
            minDate: new Date(),
            numberOfMonths: 1,
            dateFormat: "dd M yy",
            //changeMonth: true,
            //changeYear: true,
            //onSelect: function (txt, inst) {
            //    jQuery('#block1').show();
            //},
            //onClose: function (selectedDate) { jQuery('#block1').hide(); }
        });
        $(".departuredate").datepicker("setDate", de);
    });
    /**
     * Bootstrap
     */
    $('[data-toggle="tooltip"]').tooltip();
    $("[data-toggle=popover]").popover({
        container: "body",
        sanitize: false,
        html: true,
        content: function () {
            return $("#" + $(this).data("id")).html();
        },
    });
    $("body").on("click", function (e) {
        $("[data-toggle=popover]").each(function () {
            if (
                !$(this).is(e.target) &&
                $(this).has(e.target).length === 0 &&
                $(".popover").has(e.target).length === 0
            ) {
                $(this).popover("hide");
            }
        });
    });
    $(".modal").on("show.bs.modal", function (e) {
        if (typeof e.relatedTarget != "undefined") {
            window.location.hash = $(e.relatedTarget).attr("href");
        }
    });
    $(".modal").on("hide.bs.modal", function (e) {
        history.pushState(
            "",
            document.title,
            window.location.pathname + window.location.search
        );
    });
    if (window.location.hash.indexOf("#modal-") !== -1) {
        $modal = $(window.location.hash);
        $modal.modal("show");
    }

    /**
     * Modal review
     */
    $(".modal-next").click(function (e) {
        e.preventDefault();
        var $modal = $(this).parents(".modal");
        $modal.modal("hide");
        if ($modal.nextAll(".modal").first().length > 0) {
            $modal.nextAll(".modal").first().modal("show");
        } else {
            $modal.prevAll(".modal").last().modal("show");
        }
    });
    $(".modal-prev").click(function (e) {
        e.preventDefault();
        var $modal = $(this).parents(".modal");
        $modal.modal("hide");
        if ($modal.prevAll(".modal").first().length > 0) {
            $modal.prevAll(".modal").first().modal("show");
        } else {
            $modal.nextAll(".modal").last().modal("show");
        }
    });

    /**
     * Site header scroll
     */
    if ($(window).scrollTop() > 0) {
        $(".site-header").addClass("scroll");
    }
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $(".site-header").addClass("scroll");
        } else {
            $(".site-header").removeClass("scroll");
        }
    });

    /**
     * Aside nav
     */
    $(".aside-nav-toggler").on("click touchstart", function () {
        $("body")
            .addClass("open-aside-nav")
            .append('<div class="aside-overlay"></div>')
            .css("overflow", "hidden");
        return false;
    });
    $("body").on(
        "click touchstart",
        ".aside-nav-closer, .aside-overlay",
        function (e) {
            e.stopPropagation();
            $("body").removeClass("open-aside-nav").css("overflow", "");
            $(".aside-overlay").remove();
            return false;
        }
    );
    $(".aside-nav li.menu-item-has-children").on("click", function (e) {
        e.stopPropagation();
        $(this)
            .siblings()
            .removeClass("active")
            .children(".sub-menu")
            .slideUp(300);
        $(this).toggleClass("active").children(".sub-menu").slideToggle(300);
    });
    $(".aside-nav li.menu-item-has-children > a").on("click", function (e) {
        e.stopPropagation();
    });

    /**
     * Booking
     */

    $("body").on("click", function () {
        $("#site-booking").collapse("hide");
    });
    $(".site-booking").on("click", function (e) {
        e.stopPropagation();
    });
    $(".site-booking-closer").on("click", function () {
        $("#site-booking").collapse("hide");
    });

    /**
     * Site slider
     */
    //var $siteSlider = $('.site-slider');
    //$siteSlider.find('.item').height($(window).height());
    var $siteSlider = $(".page .site-slider");
    $siteSlider.find(".item").height($(window).height());
    if ($(window).width() < 992) {
        $(".home-slider .site-slider").on("init", function () {
            $(this)
                .find(".item")
                .height($(window).height() - 380);
        });
    } else {
        $(".home-slider .site-slider").on("init", function () {
            $(this)
                .find(".item")
                .height($(window).height() - 150);
        });
    }
    $(window).resize(function () {
        if ($(window).width() < 992) {
            $(".home-slider .site-slider .item").height(
                $(window).height() - 380
            );
        } else {
            $(".home-slider .site-slider .item").height(
                $(window).height() - 150
            );
        }
    });
    $siteSlider.on("init", function (e, slick) {
        $siteSlider.find(".slick-slide:first-child").addClass("slick-first");
    });

    $siteSlider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        speed: 800,
        autoplay: true,
        autoplaySpeed: 4000,
        focusOnSelect: true,
        pauseOnHover: false,
        dots: false,
        //responsive: [
        //	{
        //	    breakpoint: 991,
        //	    settings: {
        //	        arrows: false
        //	    }
        //	},
        //    {
        //        breakpoint: 768,
        //        settings: {
        //            arrows: true,
        //            dots: false
        //        }
        //    },
        //]
    });
    var $siteSliderHome = $(".home-slider .site-slider");
    $siteSliderHome.slick({
        //fade: true,
        speed: 800,
        autoplay: true,
        autoplaySpeed: 3500,
        dots: true,
        arrows: true,
        prevArrow:
            '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
    });
    var $siteSliderPage = $(".page-slider .site-slider");
    if ($(window).width() < 992) {
        $(".page-slider .site-slider").on("init", function () {
            $(this).find(".item").height($(window).height());
        });
    } else {
        $(".page-slider .site-slider").on("init", function () {
            $(this)
                .find(".item")
                .height($(window).height() - 350);
        });
    }
    $(window).resize(function () {
        if ($(window).width() < 992) {
            $(".page-slider .site-slider .item").height($(window).height());
        } else {
            $(".page-slider .site-slider .item").height(
                $(window).height() - 350
            );
        }
    });
    $siteSliderPage.slick({
        //fade: true,
        speed: 800,
        autoplay: true,
        autoplaySpeed: 3500,
        dots: false,
        arrows: true,
    });
    //$('.site-slider').slick({
    //    dots: false,
    //});
    /**
     * Site video
     */
    var videoSrc = $(".site-video iframe").attr("src");
    $(".site-video-toggler").on("click", function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).html('<i class="far fa-play-circle"></i>');
            $(".site-video iframe").attr("src", videoSrc + "&autoplay=0");
            $(".site-video").fadeOut();
        } else {
            $(this).addClass("active");
            $(this).html('<i class="far fa-pause-circle"></i>');
            $(".site-video iframe").attr("src", videoSrc + "&autoplay=1");
            $(".site-video").fadeIn();
        }
    });

    /**
     * Home rooms
     */
    $(".home-rooms").slick({
        slidesToScroll: 1,
        slidesToShow: 1,
        speed: 900,
        centerMode: true,
        centerPadding: "14%",
        prevArrow:
            '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    centerPadding: "0",
                },
            },
        ],
    });

    /**
     * Home brands nav
     */
    $(".home-brands-thumbs").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        focusOnSelect: true,
        centerMode: true,
        asNavFor: ".home-brands-images",
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    arrows: false,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    arrows: false,
                },
            },
        ],
    });
    $(".home-brands-images").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 300,
        fade: true,
        asNavFor: ".home-brands-thumbs",
        arrows: false,
    });

    /**
     * Standard category post gallery
     */
    $(".std-cat-post-gallery, .std-post-gallery").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 600,
        dots: true,
        arrows: true,
        prevArrow:
            '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
            '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        infinite: false,
    });
    $('[data-toggle="tab"]').on("shown.bs.tab", function (event) {
        $(".std-cat-post-gallery, .std-post-gallery").slick("setPosition");
    });
    $(".slick-dots").each(function () {
        if ($(this).find("li").length == 1) {
            $(this).remove();
        }
    });
    /**
     * Single Gallery
     */
    $(".single-room-gallery").owlCarousel({
        margin: 1,
        responsiveClass: true,
        nav: true,
        dots: false,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });
    /**
     * Single Offer
     */
    $(".single-offer").owlCarousel({
        margin: 0,
        responsiveClass: true,
        nav: true,
        //navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });
    /**
     * Single New1
     */
    $(".single-new1").owlCarousel({
        margin: 10,
        responsiveClass: true,
        nav: true,
        dots: false,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });
    /**
     * Single blog room
     */
    $(".single-blog-room").owlCarousel({
        margin: 60,
        responsiveClass: true,
        nav: true,
        dots: false,
        navText: ["<span></span>", "<span></span>"],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
        },
    });
    /**
     * Single blog
     */
    $(".single-blog").owlCarousel({
        margin: 30,
        responsiveClass: true,
        nav: true,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });
    /**
     * Single Services
     */
    $(".single-services").owlCarousel({
        margin: 50,
        responsiveClass: true,
        nav: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });
    /**
     * Single quote
     */
    $(".single-quote").owlCarousel({
        margin: 30,
        responsiveClass: true,
        nav: true,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        //navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 1,
            },
            992: {
                items: 1,
            },
        },
    });
    /**
     * Fancybox
     */
    $("[data-fancybox]").fancybox({
        backFocus: false,
        youtube: {
            showinfo: 0,
        },
        thumbs: {
            autoStart: true,
        },
    });

    /**
     * Form book
     */
    $('[href^="#modal-"]').on("click", function () {
        $modal = $($(this).attr("href"));
        $modal.modal("show");
        $modal.find(".modal-title").text($(this).text());
        $modal.find('[name="book"]').val($(this).text());
        $modal.find('[name="page"]').val($(this).data("page"));
        $modal.find('[name="bookname"]').val($(this).data("bookname"));
        $modal.find('[name="bookemail"]').val($(this).data("bookemail"));
        $modal.find(".alert").remove();
    });
    if (window.location.hash.indexOf("#popup-info") !== -1) {
        $modal = $(window.location.hash);
        $modal.modal("show");
    }

    $("#cmdOffer").on("click", function () {
        var _name = $("#msinquiryname").val();
        var _email = $("#inquiryemail").val();
        var _phone = $("#inquiryphone").val();
        var _date = $("#inquirydate").val();
        var _people = $("#inquirypeople").val();
        var _requests = $("#inquirymessage").val();
        var _offername = $("#inquirypage").val();
        if (
            checkInputOffer(
                _name,
                _email,
                _phone,
                _date,
                _people,
                _offername
            ) == true
        ) {
            $("#loadingImg").show();
            $.ajax({
                type: "POST",
                url: "/Ajax/AjaxBookOffer.ashx",
                data: {
                    name: _name,
                    email: _email,
                    phone: _phone,
                    requests: _requests,
                    date: _date,
                    people: _people,
                    offername: _offername,
                },
                success: function (data) {
                    if (data == "ok") {
                        $("#loadingImg").hide();
                        window.location.href = "/complete?type=2";
                    } else {
                        setTimeout(function () {
                            $("#loadingImg").hide();
                            $("#mesg").html(
                                "Error! Can not connect to server."
                            );
                        }, 2000);
                    }
                },
            });
        } else {
            $("#mesg").css({ color: "red" });
            $("#mesg").html("Mandatory fields are marked as (*)");
        }
    });
    function checkInputOffer(
        _title,
        _firstname,
        _lastname,
        _email,
        _country,
        _date,
        _adults,
        _children
    ) {
        var ok = true;
        if (_title == "") {
            $("#mstitle")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mstitle")[0].innerHTML = null;
        }
        if (_firstname == "") {
            $("#msfirstname")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msfirstname")[0].innerHTML = null;
        }
        if (_lastname == "") {
            $("#mslastname")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mslastname")[0].innerHTML = null;
        }
        if (_email == "") {
            $("#msemail")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msemail")[0].innerHTML = null;
            var emailRegexStr =
                /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var isvalid = emailRegexStr.test(_email);
            if (!isvalid) {
                $("#msemail")[0].innerHTML = "Invalid email address!";
                ok = false;
            }
        }
        //if (_phone == "") {
        //    $("#msphone")[0].innerHTML = "Required Fields";
        //    ok = false;
        //}
        //else { $("#msphone")[0].innerHTML = null; }
        if (_country == "") {
            $("#mscountry")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mscountry")[0].innerHTML = null;
        }

        if (_date == "") {
            $("#msdate")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msdate")[0].innerHTML = null;
        }
        if (_adults == "") {
            $("#msadults")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msadults")[0].innerHTML = null;
        }
        if (_children == "") {
            $("#mschildren")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mschildren")[0].innerHTML = null;
        }
        return ok;
    }
    /**
     * contact
     */
    $("#cmdContact").on("click", function () {
        var _name = $("#name").val();
        //var _surname = $("#surname").val();
        var _email = $("#email").val();
        var _subject = $("#subject ").val();
        var _requests = $("#requests").val();
        if (checkInputContact(_name, _email, _requests) == true) {
            $("#loadingImg").show();
            $.ajax({
                type: "POST",
                url: "/Ajax/AjaxContact.ashx",
                data: {
                    name: _name,
                    email: _email,
                    subject: _subject,
                    requests: _requests,
                },
                success: function (data) {
                    if (data == "ok") {
                        $("#loadingImg").hide();
                        window.location.href = "/complete?type=1";
                    } else {
                        setTimeout(function () {
                            $("#loadingImg").hide();
                            $("#msgbox").style.color = "red";
                            $("#msgbox").html(
                                "Error! Can not connect to server."
                            );
                        }, 2000);
                    }
                },
            });
        } else {
            $("#msgbox").css({ color: "red" });
            $("#msgbox").html("Mandatory fields are marked as (*)");
        }
    });
    function checkInputContact(_name, _email, _requests) {
        var ok = true;
        if (_name == "") {
            $("#msname")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msname")[0].innerHTML = null;
        }
        //if (_surname == "") {
        //    $("#mssurname")[0].innerHTML = "Required Fields";
        //    ok = false;
        //}
        //else { $("#mssurname")[0].innerHTML = null; }
        if (_email == "") {
            $("#msemail")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msemail")[0].innerHTML = null;
            var emailRegexStr =
                /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var isvalid = emailRegexStr.test(_email);
            if (!isvalid) {
                $("#msemail")[0].innerHTML = "Invalid email address!";
                ok = false;
            }
        }
        //if (_subject == "") {
        //    $("#mssubject")[0].innerHTML = "Required Fields";
        //    ok = false;
        //}
        //else { $("#mssubject")[0].innerHTML = null; }
        if (_requests == "") {
            $("#msrequests")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msrequests")[0].innerHTML = null;
        }
        return ok;
    }
    function check(value) {
        //tạo function
        var _value = $("#" + value).val();
        if (_value == "") {
            $("#ms" + value)[0].innerHTML = "Required Fields";
        } else $("#ms" + value)[0].innerHTML = "";
    }
    function checkEmail() {
        //tạo function
        var _email = $("#email").val();
        if (_email == "") {
            $("#msemail")[0].innerHTML = "Required Fields";
        } else {
            var emailRegexStr =
                /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var isvalid = emailRegexStr.test(_email);
            if (!isvalid) {
                $("#msemail")[0].innerHTML = "Invalid email address!";
            } else $("#msemail")[0].innerHTML = "";
        }
    }
    $(".form-book-room").on("submit", function (e) {
        e.preventDefault();
        var $this = $(this);
        $this
            .find(".btn")
            .append('<i class="fa fa-circle-notch fa-spin ml-2 iconx"></i>');
        $this.find(".alert").remove();
        $.ajax({
            type: "POST",
            //url: ajax.ajax_url,
            url: "/Ajax/AjaxBookingOnRequest.ashx",
            data: $this.serialize(),
            success: function (data, textStatus, jqXHR) {
                setTimeout(function () {
                    $this.find(".btn").find(".iconx").remove();
                    if (data.status == "ok") {
                        $this.find(".form-control").val("");
                        $this.append(
                            '<div class="alert alert-success">' +
                                data.content +
                                "</div>"
                        );
                    } else {
                        $this.append(
                            '<div class="alert alert-danger">' +
                                data.content +
                                "</div>"
                        );
                    }
                }, 500);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            },
        });
    });
    $(".form-contact").on("submit", function (e) {
        e.preventDefault();
        var $this = $(this);
        $this
            .find(".btn")
            .append('<i class="fa fa-circle-notch fa-spin ml-2 iconx"></i>');
        $this.find(".alert").remove();
        $.ajax({
            type: "POST",
            //url: ajax.ajax_url,
            url: "/Ajax/AjaxContact.ashx",
            data: $this.serialize(),
            success: function (data, textStatus, jqXHR) {
                setTimeout(function () {
                    $this.find(".btn").find(".iconx").remove();
                    if (data.status == "ok") {
                        $this.find(".form-control").val("");
                        $this.append(
                            '<div class="alert alert-success">' +
                                data.content +
                                "</div>"
                        );
                    } else {
                        $this.append(
                            '<div class="alert alert-danger">' +
                                data.content +
                                "</div>"
                        );
                    }
                }, 500);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            },
        });
    });
    $(".form-book-offer").on("submit", function (e) {
        e.preventDefault();
        var $this = $(this);
        $this
            .find(".btn")
            .append('<i class="fa fa-circle-notch fa-spin ml-2 iconx"></i>');
        $this.find(".alert").remove();
        $.ajax({
            type: "POST",
            url: "/Ajax/AjaxBookOffer.ashx",
            data: $this.serialize(),
            success: function (data, textStatus, jqXHR) {
                setTimeout(function () {
                    $this.find(".btn").find(".iconx").remove();
                    if (data.status == "ok") {
                        $this.find(".form-control").val("");
                        $this.append(
                            '<div class="alert alert-success">' +
                                data.content +
                                "</div>"
                        );
                    } else {
                        $this.append(
                            '<div class="alert alert-danger">' +
                                data.content +
                                "</div>"
                        );
                    }
                }, 500);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            },
        });
    });
    $(".form-book-service").on("submit", function (e) {
        e.preventDefault();
        var $this = $(this);
        $this
            .find(".btn")
            .append('<i class="fa fa-circle-notch fa-spin ml-2 iconx"></i>');
        $this.find(".alert").remove();
        $.ajax({
            type: "POST",
            url: "/Ajax/AjaxBookService.ashx",
            data: $this.serialize(),
            success: function (data, textStatus, jqXHR) {
                setTimeout(function () {
                    $this.find(".btn").find(".iconx").remove();
                    if (data.status == "ok") {
                        $this.find(".form-control").val("");
                        $this.append(
                            '<div class="alert alert-success">' +
                                data.content +
                                "</div>"
                        );
                    } else {
                        $this.append(
                            '<div class="alert alert-danger">' +
                                data.content +
                                "</div>"
                        );
                    }
                }, 500);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            },
        });
    });
    $(".form-book-tour").on("submit", function (e) {
        e.preventDefault();
        var $this = $(this);
        $this
            .find(".btn")
            .append('<i class="fa fa-circle-notch fa-spin ml-2 iconx"></i>');
        $this.find(".alert").remove();
        $.ajax({
            type: "POST",
            //url: ajax.ajax_url,
            url: "/Ajax/AjaxBookTour.ashx",
            data: $this.serialize(),
            success: function (data, textStatus, jqXHR) {
                setTimeout(function () {
                    $this.find(".btn").find(".iconx").remove();
                    if (data.status == "ok") {
                        $this.find(".form-control").val("");
                        $this.append(
                            '<div class="alert alert-success">' +
                                data.content +
                                "</div>"
                        );
                    } else {
                        $this.append(
                            '<div class="alert alert-danger">' +
                                data.content +
                                "</div>"
                        );
                    }
                }, 500);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            },
        });
    });
    $(".form-book-restaurant").on("submit", function (e) {
        e.preventDefault();
        var $this = $(this);
        $this
            .find(".btn")
            .append('<i class="fa fa-circle-notch fa-spin ml-2 iconx"></i>');
        $this.find(".alert").remove();
        $.ajax({
            type: "POST",
            //url: ajax.ajax_url,
            url: "/Ajax/AjaxBookRestaurant.ashx",
            data: $this.serialize(),
            success: function (data, textStatus, jqXHR) {
                setTimeout(function () {
                    $this.find(".btn").find(".iconx").remove();
                    if (data.status == "ok") {
                        $this.find(".form-control").val("");
                        $this.append(
                            '<div class="alert alert-success">' +
                                data.content +
                                "</div>"
                        );
                    } else {
                        $this.append(
                            '<div class="alert alert-danger">' +
                                data.content +
                                "</div>"
                        );
                    }
                }, 500);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            },
        });
    });
    $(".form-book-spa").on("submit", function (e) {
        e.preventDefault();
        var $this = $(this);
        $this
            .find(".btn")
            .append('<i class="fa fa-circle-notch fa-spin ml-2 iconx"></i>');
        $this.find(".alert").remove();
        $.ajax({
            type: "POST",
            //url: ajax.ajax_url,
            url: "/Ajax/AjaxBookSpa.ashx",
            data: $this.serialize(),
            success: function (data, textStatus, jqXHR) {
                setTimeout(function () {
                    $this.find(".btn").find(".iconx").remove();
                    if (data.status == "ok") {
                        $this.find(".form-control").val("");
                        $this.append(
                            '<div class="alert alert-success">' +
                                data.content +
                                "</div>"
                        );
                    } else {
                        $this.append(
                            '<div class="alert alert-danger">' +
                                data.content +
                                "</div>"
                        );
                    }
                }, 500);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            },
        });
    });
    $("#tourSubmit").on("click", function () {
        //var _hotel = $("#hotelname").text();
        //var _hotelid = $("#hotelid").val();
        var _title = $("#title").val();
        var _firstname = $("#firstname").val();
        var _lastname = $("#lastname").val();
        var _email = $("#email").val();
        var _phone = $("#phone").val();
        var _country = $("#country").val();
        var _adults = $("#adults").val();
        var _children = $("#children").val();
        var _childrenunder = $("#childrenunder").val();
        var _tourname = $("#tourname").text();
        var _departuredate = $("#departuredate").val();
        var _pickuphotel = $("#pickuphotel").val();
        var _dropoffhotel = $("#dropoffhotel").val();
        var _requests = $("#requests").val();
        var _linkurl = $("#hilinkurl").val();
        if (
            checkInputTour(
                _title,
                _firstname,
                _lastname,
                _email,
                _country,
                _adults,
                _departuredate
            ) == true
        ) {
            $("#loadingImg").show();
            $.ajax({
                type: "POST",
                url: "/Ajax/AjaxBookTour.ashx",
                data: {
                    title: _title,
                    firstname: _firstname,
                    lastname: _lastname,
                    email: _email,
                    phone: _phone,
                    country: _country,
                    requests: _requests,
                    adults: _adults,
                    child: _children,
                    childrenunder: _childrenunder,
                    tourname: _tourname,
                    departuredate: _departuredate,
                    pickuphotel: _pickuphotel,
                    dropoffhotel: _dropoffhotel,
                    linkurl: _linkurl,
                },
                success: function (data) {
                    if (data == "ok") {
                        $("#loadingImg").hide();
                        window.location.href = "/complete?type=3";
                    } else {
                        setTimeout(function () {
                            $("#loadingImg").hide();
                            $("#mesg").style.color = "red";
                            $("#mesg").html(
                                "Error! Can not connect to server."
                            );
                        }, 2000);
                    }
                },
            });
        } else {
            $("#mesg").css({ color: "red" });
            $("#mesg").html("Mandatory fields are marked as (*)");
        }
    });
    function checkInputTour(
        _title,
        _firstname,
        _lastname,
        _email,
        _country,
        _adults,
        _departuredate
    ) {
        var ok = true;
        if (_title == "") {
            $("#mstitle")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mstitle")[0].innerHTML = null;
        }
        if (_firstname == "") {
            $("#msfirstname")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msfirstname")[0].innerHTML = null;
        }
        if (_lastname == "") {
            $("#mslastname")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mslastname")[0].innerHTML = null;
        }
        if (_email == "") {
            $("#msemail")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msemail")[0].innerHTML = null;
            var emailRegexStr =
                /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var isvalid = emailRegexStr.test(_email);
            if (!isvalid) {
                $("#msemail")[0].innerHTML = "Invalid email address!";
                ok = false;
            }
        }
        if (_country == "") {
            $("#mscountry")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mscountry")[0].innerHTML = null;
        }
        if (_adults == "") {
            $("#msadults")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msadults")[0].innerHTML = null;
        }
        if (_departuredate == "DD/MM/YYYY") {
            $("#msdeparturedate")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msdeparturedate")[0].innerHTML = null;
        }
        return ok;
    }
    $("#cmdTable").on("click", function () {
        var _tablepage = $("#tablepage").text();
        var _name = $("#tablename").val();
        var _email = $("#tableemail").val();
        var _phone = $("#tablephone").val();
        var _date = $("#tabledate").val();
        var _requests = $("#tablemessage").val();
        var _hour = $("#tablehour").val();
        var _minute = $("#tableminute").val();
        var _period = $("#tableperiod").val();
        var _people = $("#tablepeople").val();
        var _restaurantEmail = $("#restaurantEmail").val();
        if (
            checkInputTable(
                _name,
                _email,
                _phone,
                _date,
                _hour,
                _minute,
                _period,
                _people
            ) == true
        ) {
            $("#loadingImg").show();
            $.ajax({
                type: "POST",
                url: "/Ajax/AjaxBookOption.ashx",
                data: {
                    name: _name,
                    email: _email,
                    phone: _phone,
                    requests: _requests,
                    people: _people,
                    date: _date,
                    hour: _hour,
                    minute: _minute,
                    period: _period,
                    restaurantName: _tablepage,
                    restaurantEmail: _restaurantEmail,
                },
                success: function (data) {
                    if (data == "ok") {
                        $("#loadingImg").hide();
                        window.location.href = "/complete?type=4";
                    } else {
                        setTimeout(function () {
                            $("#loadingImg").hide();
                            $("#mesg").style.color = "red";
                            $("#mesg").html(
                                "Error! Can not connect to server."
                            );
                        }, 2000);
                    }
                },
            });
        } else {
            $("#mesg").css({ color: "red" });
            $("#mesg").html("Mandatory fields are marked as (*)");
        }
    });
    function checkInputTable(
        _name,
        _email,
        _phone,
        _date,
        _hour,
        _minute,
        _period,
        _people
    ) {
        var ok = true;
        if (_name == "") {
            $("#mstablename")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mstablename")[0].innerHTML = null;
        }
        if (_email == "") {
            $("#mstableemail")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mstableemail")[0].innerHTML = null;
            var emailRegexStr =
                /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var isvalid = emailRegexStr.test(_email);
            if (!isvalid) {
                $("#mtablesemail")[0].innerHTML = "Invalid email address!";
                ok = false;
            }
        }
        if (_phone == "") {
            $("#mstablephone")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mstablephone")[0].innerHTML = null;
        }
        if (_date == "") {
            $("#mstabledate")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mstabledate")[0].innerHTML = null;
        }
        if (_hour == "") {
            $("#mstablehour")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mstablehour")[0].innerHTML = null;
        }
        if (_minute == "") {
            $("#mstableminute")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mstableminute")[0].innerHTML = null;
        }
        if (_period == "") {
            $("#mstableperiod")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mstableperiod")[0].innerHTML = null;
        }
        if (_people == "") {
            $("#mstablepeople")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#mstablepeople")[0].innerHTML = null;
        }
        //if (_subject == "") {
        //    $("#mssubject")[0].innerHTML = "Required Fields";
        //    ok = false;
        //}
        //else { $("#mssubject")[0].innerHTML = null; }
        //if (_requests == "") {
        //    $("#msrequests")[0].innerHTML = "Required Fields";
        //    ok = false;
        //}
        //else { $("#msrequests")[0].innerHTML = null; }
        return ok;
    }
    $("#cmdSpa").on("click", function () {
        var _spaname = $("#spapage").val();
        var _name = $("#spaname").val();
        var _email = $("#spaemail").val();
        var _phone = $("#spaphone").val();
        var _date = $("#spadate").val();
        var _requests = $("#spamessage").val();
        var _people = $("#spapeople").val();
        var _spamail = $("#hispamail").val();
        if (
            checkInputSpa(
                _name,
                _email,
                _phone,
                _date,
                _hour,
                _minute,
                _period,
                _people
            ) == true
        ) {
            $("#loadingImg").show();
            $.ajax({
                type: "POST",
                url: "/Ajax/AjaxBookOption.ashx",
                data: {
                    name: _name,
                    email: _email,
                    phone: _phone,
                    requests: _requests,
                    people: _people,
                    date: _date,
                    spaname: _spaname,
                    spamail: _spamail,
                },
                success: function (data) {
                    if (data == "ok") {
                        $("#loadingImg").hide();
                        window.location.href = "/complete?type=5";
                    } else {
                        setTimeout(function () {
                            $("#loadingImg").hide();
                            $("#mesg").style.color = "red";
                            $("#mesg").html(
                                "Error! Can not connect to server."
                            );
                        }, 2000);
                    }
                },
            });
        } else {
            $("#mesg").css({ color: "red" });
            $("#mesg").html("Mandatory fields are marked as (*)");
        }
    });
    function checkInputSpa(_name, _email, _phone, _date, _people) {
        var ok = true;
        if (_name == "") {
            $("#msspaname")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msspaname")[0].innerHTML = null;
        }
        if (_email == "") {
            $("#msspaemail")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msspaemail")[0].innerHTML = null;
            var emailRegexStr =
                /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var isvalid = emailRegexStr.test(_email);
            if (!isvalid) {
                $("#mspaemail")[0].innerHTML = "Invalid email address!";
                ok = false;
            }
        }
        if (_phone == "") {
            $("#msspaphone")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msspaphone")[0].innerHTML = null;
        }
        if (_date == "") {
            $("#msspadate")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msspadate")[0].innerHTML = null;
        }
        if (_people == "") {
            $("#msspapeople")[0].innerHTML = "Required Fields";
            ok = false;
        } else {
            $("#msspapeople")[0].innerHTML = null;
        }
        //if (_subject == "") {
        //    $("#mssubject")[0].innerHTML = "Required Fields";
        //    ok = false;
        //}
        //else { $("#mssubject")[0].innerHTML = null; }
        //if (_requests == "") {
        //    $("#mssparequests")[0].innerHTML = "Required Fields";
        //    ok = false;
        //}
        //else { $("#msrequests")[0].innerHTML = null; }
        return ok;
    }
    // setTimeout(function () {
    //     $('.modal-booking .modal-body').html(bookingCode);
    //     $('body').append(customizerJs);
    // }, 3000);

    // Default calendar namespaces
    var dateFormat =
            "<span class='day'>d</span> <span class='month'>M</span> <span class='year'>yy</span>",
        dateArrival = "#dateArrival .dateArrival",
        dateDeparture = "#dateDeparture .dateDeparture",
        fromDate = "#dateArrival .fromDate",
        toDate = "#dateDeparture .toDate",
        dateArrivalVal = "#dateArrival .date-value",
        dateDepartureVal = "#dateDeparture .date-value",
        submit_link = "submit_link";

    // Show arrival calendar
    $(dateArrival).datepicker({
        minDate: "D",
        dateFormat: dateFormat,
        // get value on selected date for departure
        onSelect: function (txt, inst) {
            // get arrival value
            $(dateArrivalVal).html($(dateArrival).val());
            $(fromDate).val(
                $.datepicker.formatDate(
                    "yy-mm-dd",
                    $(this).datepicker("getDate")
                )
            );
            // set date format
            $(dateDepartureVal).html(txt);
            //$(submit_link).href("https://hotels.cloudbeds.com/reservation/zxvH2E?ga_sess_id=1413040690.1657504079#checkin=" + $(fromDate).val() + "&checkout=" + $(toDate).val());
            // set day after
            //var NewDay = $(dateDepartureVal).find('.day'),
            //NewDayVal = NewDay.html();
            //NewDay.html(parseInt(NewDayVal) + 1);
        },
        onClose: function (selectedDate) {
            var myDate = $(this).datepicker("getDate");
            myDate.setDate(myDate.getDate() + 1);
            // Set min-date value and day after on date departure
            $(dateDeparture).datepicker("option", "minDate", myDate);
            $(dateDepartureVal)
                .find(".day")
                .html($.datepicker.formatDate("d", myDate));
            $(dateDepartureVal)
                .find(".month")
                .html($.datepicker.formatDate("M", myDate));
            $(dateDepartureVal)
                .find(".year")
                .html($.datepicker.formatDate("yy", myDate));
            $(toDate).val($.datepicker.formatDate("yy-mm-dd", myDate));
            $(submit_link).href(
                "https://hotels.cloudbeds.com/reservation/zxvH2E?ga_sess_id=1413040690.1657504079#checkin=" +
                    $(fromDate).val() +
                    "&checkout=" +
                    $(toDate).val()
            );
            //createCookie('checkin', $.datepicker.formatDate('d M yy', $(this).datepicker('getDate')), 7);
        },
    });

    // Show departure calendar
    $(dateDeparture).datepicker({
        minDate: "D+1",
        dateFormat: dateFormat,
        // get value on selected date for return
        onSelect: function (txt, inst) {
            //$(dateDepartureVal).html(txt);
            $(dateDepartureVal).html($(dateDeparture).val());
            $(toDate).val(
                $.datepicker.formatDate(
                    "yy-mm-dd",
                    $(this).datepicker("getDate")
                )
            );
            //$(submit_link).href("https://hotels.cloudbeds.com/reservation/zxvH2E?ga_sess_id=1413040690.1657504079#checkin=" + $(fromDate).val() + "&checkout=" + $(toDate).val());
        },
        onClose: function (selectedDate) {
            var myDate = $(this).datepicker("getDate");
            $(submit_link).href(
                "https://hotels.cloudbeds.com/reservation/zxvH2E?ga_sess_id=1413040690.1657504079#checkin=" +
                    $(fromDate).val() +
                    "&checkout=" +
                    $(toDate).val()
            );
            //createCookie('checkout', $.datepicker.formatDate('d M yy', myDate), 7);
        },
    });

    // set current date
    $(".datepicker").datepicker("setDate", "today");
    // get current value from departure
    $(dateArrivalVal).html($(dateArrival).val());
    // get current value from return
    $(dateDepartureVal).html($(dateDeparture).val());
    // hide return input field
    updateGuestNumber();
    // update number of guest list

    // Guests
    // -------------------------------------------------------

    var $guests = $(".guests"),
        $guestList = $(".guests .guest-list");

    // Guest list toogle event - dropdown
    $(".guests .result").on("click", function (e) {
        e.stopPropagation();
        $guests.toggleClass("show");

        if ($guests.hasClass("show")) {
            $guestList.fadeIn();
        } else {
            $guestList.fadeOut();
        }
    });
    // Guests adult
    // -------------------------------------------------------

    var $guestsadult = $(".guests-adult"),
        $guestadultList = $(".guests-adult .guest-adult-list");

    // Guest adult list toogle event - dropdown
    $(".guests-adult .result").on("click", function (e) {
        e.stopPropagation();
        $guestsadult.toggleClass("show");

        if ($guestsadult.hasClass("show")) {
            $guestadultList.fadeIn();
        } else {
            $guestadultList.fadeOut();
        }
    });
    // guests-child
    // -------------------------------------------------------

    var $guestschildren = $(".guests-children"),
        $guestchildrenList = $(".guests-children .guest-children-list");

    // Guest child list toogle event - dropdown
    $(".guests-children .result").on("click", function (e) {
        e.stopPropagation();
        $guestschildren.toggleClass("show");

        if ($guestschildren.hasClass("show")) {
            $guestchildrenList.fadeIn();
        } else {
            $guestchildrenList.fadeOut();
        }
    });
    // Close on page click
    $(".qty-apply").on("click", function (e) {
        $guestList.fadeOut();
        $guests.removeClass("show");
    });
    // Close on page click
    $(".qty-apply-adult").on("click", function (e) {
        $guestadultList.fadeOut();
        $guestsadult.removeClass("show");
    });
    // Close on page click
    $(".qty-apply-children").on("click", function (e) {
        $guestchildrenList.fadeOut();
        $guestschildren.removeClass("show");
    });
    // Quantities (add remove guests numbers)
    // -------------------------------------------------------

    $(".guest-list .qty-plus")
        .add(".qty-minus")
        .on("click", function (e) {
            e.preventDefault();

            var $this = $(this),
                fieldName = $this.attr("data-field"),
                $input = $("input#" + fieldName);

            var currentVal = parseInt($input.data("value"), 10),
                ticketType = $input.data("tickettype");

            if (!isNaN(currentVal)) {
                var isChanged = false,
                    value = 0;

                if ($this.hasClass("qty-plus") && currentVal < 12) {
                    value = currentVal + 1;
                    isChanged = true;
                }

                if ($this.hasClass("qty-minus") && currentVal > 0) {
                    value = currentVal - 1;
                    isChanged = true;
                }

                if (isChanged) {
                    $input.data("value", value);
                    $(ticketType).val(ticketType + "-" + value);
                    $input.val(value);
                    // Update guests number
                    updateGuestNumber();
                }
            }
        });
    $(".guest-adult-list .qty-plus")
        .add(".guest-adult-list .qty-minus")
        .on("click", function (e) {
            e.preventDefault();

            var $this = $(this),
                fieldName = $this.attr("data-field"),
                $input = $("input#" + fieldName);

            var currentVal = parseInt($input.data("value"), 10),
                ticketType = $input.data("tickettype");

            if (!isNaN(currentVal)) {
                var isChanged = false,
                    value = 0;

                if ($this.hasClass("qty-plus") && currentVal < 12) {
                    value = currentVal + 1;
                    isChanged = true;
                }

                if ($this.hasClass("qty-minus") && currentVal > 0) {
                    value = currentVal - 1;
                    isChanged = true;
                }

                if (isChanged) {
                    $input.data("value", value);
                    $(ticketType).val(ticketType + "-" + value);
                    $input.val(value);
                    // Update guests number
                    updateAdultNumber();
                }
            }
        });
    $(".guest-children-list .qty-plus")
        .add(".guest-children-list .qty-minus")
        .on("click", function (e) {
            e.preventDefault();

            var $this = $(this),
                fieldName = $this.attr("data-field"),
                $input = $("input#" + fieldName);

            var currentVal = parseInt($input.data("value"), 10),
                ticketType = $input.data("tickettype");

            if (!isNaN(currentVal)) {
                var isChanged = false,
                    value = 0;

                if ($this.hasClass("qty-plus") && currentVal < 12) {
                    value = currentVal + 1;
                    isChanged = true;
                }

                if ($this.hasClass("qty-minus") && currentVal > 0) {
                    value = currentVal - 1;
                    isChanged = true;
                }

                if (isChanged) {
                    $input.data("value", value);
                    $(ticketType).val(ticketType + "-" + value);
                    $input.val(value);
                    // Update guests number
                    updateChildNumber();
                }
            }
        });
    // Passangers result
    function updateGuestNumber() {
        var adult = $("#ticket-adult").val(),
            children = $("#ticket-children").val(),
            infants = $("#ticket-infants").val(),
            qty = $("#qty-result");
        qty.val(
            parseInt(adult, 10) + parseInt(children, 10) + parseInt(infants, 10)
        );
        // DOM results
        $("#qty-result-text").text(qty.val());
    }
    // Passangers a
    function updateAdultNumber() {
        var adult = $("#ticket-adult").val(),
            //qty = $('#qty-apply-adult');
            qty = $("#qty-result-adult");
        qty.val(parseInt(adult, 10));
        // DOM results
        $("#qty-result-adult-text").text(qty.val());
        $("#qty-result-adult").val(qty.val());
    }
    // Passangers Child
    function updateChildNumber() {
        var children = $("#ticket-children").val(),
            //qty = $('#qty-apply-children');
            qty = $("#qty-result-children");
        qty.val(parseInt(children, 10));
        // DOM results
        $("#qty-result-children-text").text(qty.val());
    }
    // Quote carousel
    // ----------------------------------------------------------------
    $.each($(".quote-carousel"), function (i, n) {
        $(n).owlCarousel({
            navigation: true, // Show next and prev buttons
            slideSpeed: 300,
            items: 1,
            paginationSpeed: 400,
            singleItem: false,
            navigationText: arrowIcons,
            autoPlay: 8000,
            stopOnHover: true,
        });
    });

    $(window).scroll(function () {
        var e = jQuery(window).scrollTop();
        $(".animated").each(function (i) {
            var t = $(this).offset().top;
            e + $(window).height() > t &&
                $(this)[0].classList.value.indexOf("fadeIn") < 0 &&
                ((animate = $(this).data("animate")),
                $(this).addClass(animate));
        });
        var e0 = e + $(window).height();
        var e1 = 0;
        var e2 = 0;
        var e3 = 0;
        var e4 = 0;
        var e5 = 0;
        var e6 = 0;
        var id = "content1";
        if (document.getElementById("content1") != null) {
            e1 = $(window).height() + $("#content1").offset().top;
            e2 = e1 + $("#content1").offset().top;
            e3 = e2 + $("#content1").offset().top;
            e4 = e3 + $("#content1").offset().top;
            e5 = e4 + $("#content1").offset().top;
            e6 = e5 + $("#content1").offset().top;
        }
        if (document.getElementById("content2") != null) {
            e2 = $(window).height() + $("#content2").offset().top - 160;
            e3 = e2 + $("#content2").offset().top;
            e4 = e3 + $("#content2").offset().top;
            e5 = e4 + $("#content2").offset().top;
            e6 = e5 + $("#content2").offset().top;
        }
        if (document.getElementById("content3") != null) {
            e3 = $(window).height() + $("#content3").offset().top - 160;
            e4 = e3 + $("#content3").offset().top;
            e5 = e4 + $("#content3").offset().top;
            e6 = e5 + $("#content3").offset().top;
        }
        if (document.getElementById("content4") != null) {
            e4 = $(window).height() + $("#content4").offset().top - 160;
            e5 = e4 + $("#content4").offset().top;
            e6 = e5 + $("#content4").offset().top;
        }
        if (document.getElementById("content5") != null) {
            e4 = $(window).height() + $("#content5").offset().top - 160;
            e5 = e4 + $("#content5").offset().top;
            e6 = e5 + $("#content5").offset().top;
        }
        if (document.getElementById("content6") != null) {
            e5 = $(window).height() + $("#content6").offset().top - 160;
            e6 = e5 + $("#content6").offset().top;
        }
        if (e0 > e1 && e0 < e2 && e0 < e3 && e0 < e4 && e0 < e5 && e0 < e6) {
            var id = "content1";
            showfpc(id);
        } else if (
            e0 > e1 &&
            e0 > e2 &&
            e0 < e3 &&
            e0 < e4 &&
            e0 < e5 &&
            e0 < e6
        ) {
            var id = "content2";
            showfpc(id);
        } else if (
            e0 > e1 &&
            e0 > e2 &&
            e0 > e3 &&
            e0 < e4 &&
            e0 < e5 &&
            e0 < e6
        ) {
            var id = "content3";
            showfpc(id);
        } else if (
            e0 > e1 &&
            e0 > e2 &&
            e0 > e3 &&
            e0 > e4 &&
            e0 < e5 &&
            e0 < e6
        ) {
            var id = "content4";
            showfpc(id);
        } else if (
            e0 > e1 &&
            e0 > e2 &&
            e0 > e3 &&
            e0 > e4 &&
            e0 < e5 &&
            e0 < e6
        ) {
            var id = "content5";
            showfpc(id);
        } else if (
            e0 > e1 &&
            e0 > e2 &&
            e0 > e3 &&
            e0 > e4 &&
            e0 > e5 &&
            e0 > e6
        ) {
            var id = "content6";
            showfpc(id);
        }
    });
    $(".navbar-nav .content1").click(function () {
        $("html,body").animate(
            { scrollTop: $("#content1").offset().top - 150 },
            "slow"
        );
        var id = "content1";
        showfpc(id);
    });
    $(".navbar-nav .content2").click(function () {
        $("html,body").animate(
            { scrollTop: $("#content2").offset().top - 150 },
            "slow"
        );
        var id = "content2";
        showfpc(id);
    });
    $(".navbar-nav .content3").click(function () {
        $("html,body").animate(
            { scrollTop: $("#content3").offset().top - 150 },
            "slow"
        );
        var id = "content3";
        showfpc(id);
    });
    $(".navbar-nav .content4").click(function () {
        $("html, body").animate(
            { scrollTop: $("#content4").offset().top - 150 },
            "slow"
        );
        var id = "content4";
        showfpc(id);
    });
    $(".navbar-nav .content5").click(function () {
        $("html, body").animate(
            { scrollTop: $("#content5").offset().top - 150 },
            "slow"
        );
        var id = "content5";
        showfpc(id);
    });
    $(".navbar-nav .content6").click(function () {
        $("html, body").animate(
            { scrollTop: $("#content6").offset().top - 150 },
            "slow"
        );
        var id = "content6";
        showfpc(id);
        var hClass = $("#bookform").hasClass("form-horizontal mt-5 collapse");
        if (hClass) {
            $("#bookform").addClass("form-horizontal mt-5 collapse show");
        }
    });
    function showfpc(id) {
        var Tabs = new Array(
            "content1",
            "content2",
            "content3",
            "content4",
            "content5",
            "content6"
        );
        var TabNav = new Array(
            "nav-content1",
            "nav-content2",
            "nav-content3",
            "nav-content4",
            "nav-content5",
            "nav-content6"
        );
        var tabCtrl = null;
        for (var index = 0; index < Tabs.length; index++) {
            tabCtrl = document.getElementById(Tabs[index]);
            if (tabCtrl != null) {
                tabNav = document.getElementById(TabNav[index]);
                if (id == Tabs[index]) {
                    //tabCtrl.className = 'active';
                    $(tabCtrl).addClass("active");
                    $(tabNav).addClass("active");
                } else {
                    //tabCtrl.className = '';
                    $(tabCtrl).removeClass("active");
                    $(tabNav).removeClass("active");
                }
            }
        }
    }
    $(".scrolltosection").click(function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        var posi = $(link).offset().top;
        $("body,html").animate(
            {
                scrollTop: posi,
            },
            700
        );
    });
});
const $ = (str) => document.querySelector(str);
const $$ = (str) => document.querySelectorAll(str);

(function () {
    if (!window.app) {
        window.app = {};
    }
    app.carousel = {
        removeClass: function (el, classname = "") {
            if (el) {
                if (classname === "") {
                    el.className = "";
                } else {
                    el.classList.remove(classname);
                }
                return el;
            }
            return;
        },
        reorder: function () {
            let childcnt = $("#carouselSlide").children.length;
            let childs = $("#carouselSlide").children;

            for (let j = 0; j < 3; j++) {
                childs[j].dataset.pos = j;
            }
        },
        move: function (el) {
            let selected = el;

            if (typeof el === "string") {
                console.log(`got string: ${el}`);
                selected =
                    el == "next"
                        ? $(".selected").nextElementSibling
                        : $(".selected").previousElementSibling;
                console.dir(selected);
            }

            let curpos = parseInt(app.selected.dataset.pos);
            let tgtpos = parseInt(selected.dataset.pos);

            let cnt = curpos - tgtpos;
            let dir = cnt < 0 ? -1 : 1;
            let shift = Math.abs(cnt);

            for (let i = 0; i < shift; i++) {
                let el =
                    dir == -1
                        ? $("#carouselSlide").firstElementChild
                        : $("#carouselSlide").lastElementChild;

                if (dir == -1) {
                    el.dataset.pos = $("#carouselSlide").children.length;
                    $("#carouselSlide").append(el);
                } else {
                    el.dataset.pos = 0;
                    $("#carouselSlide").prepend(el);
                }

                app.carousel.reorder();
            }

            app.selected = selected;
            let next = selected.nextElementSibling; // ? selected.nextElementSibling : selected.parentElement.firstElementChild;
            var prev = selected.previousElementSibling; // ? selected.previousElementSibling : selected.parentElement.lastElementChild;
            var prevSecond = prev
                ? prev.previousElementSibling
                : selected.parentElement.lastElementChild;
            var nextSecond = next
                ? next.nextElementSibling
                : selected.parentElement.firstElementChild;

            selected.className = "";
            selected.classList.add("selected");

            app.carousel.removeClass(prev).classList.add("prev");
            app.carousel.removeClass(next).classList.add("next");

            app.carousel
                .removeClass(nextSecond)
                .classList.add("nextRightSecond");
            app.carousel
                .removeClass(prevSecond)
                .classList.add("prevLeftSecond");

            app.carousel.nextAll(nextSecond).forEach((item) => {
                item.className = "";
                item.classList.add("hideRight");
            });
            app.carousel.prevAll(prevSecond).forEach((item) => {
                item.className = "";
                item.classList.add("hideLeft");
            });
        },
        nextAll: function (el) {
            let els = [];

            if (el) {
                while ((el = el.nextElementSibling)) {
                    els.push(el);
                }
            }

            return els;
        },
        prevAll: function (el) {
            let els = [];

            if (el) {
                while ((el = el.previousElementSibling)) {
                    els.push(el);
                }
            }

            return els;
        },
        keypress: function (e) {
            switch (e.which) {
                case 37: // left
                    app.carousel.move("prev");
                    break;

                case 39: // right
                    app.carousel.move("next");
                    break;

                default:
                    return;
            }
            e.preventDefault();
            return false;
        },
        select: function (e) {
            console.log(`select: ${e}`);
            let tgt = e.target;
            while (!tgt.parentElement.classList.contains("carousel")) {
                tgt = tgt.parentElement;
            }

            app.carousel.move(tgt);
        },
        previous: function (e) {
            app.carousel.move("prev");
        },
        next: function (e) {
            app.carousel.move("next");
        },
        doDown: function (e) {
            console.log(`down: ${e.x}`);
            app.carousel.state.downX = e.x;
        },
        doUp: function (e) {
            console.log(`up: ${e.x}`);
            let direction = 0,
                velocity = 0;

            if (app.carousel.state.downX) {
                direction = app.carousel.state.downX > e.x ? -1 : 1;
                velocity = app.carousel.state.downX - e.x;

                if (Math.abs(app.carousel.state.downX - e.x) < 10) {
                    app.carousel.select(e);
                    return false;
                }
                if (direction === -1) {
                    app.carousel.move("next");
                } else {
                    app.carousel.move("prev");
                }
                app.carousel.state.downX = 0;
            }
        },
        init: function () {
            document.addEventListener("keydown", app.carousel.keypress);
            // $('#carousel').addEventListener("click", app.carousel.select, true);
            $("#carouselSlide").addEventListener(
                "mousedown",
                app.carousel.doDown
            );
            $("#carouselSlide").addEventListener(
                "touchstart",
                app.carousel.doDown
            );
            $("#carouselSlide").addEventListener("mouseup", app.carousel.doUp);
            $("#carouselSlide").addEventListener("touchend", app.carousel.doup);

            app.carousel.reorder();
            $("#prev").addEventListener("click", app.carousel.previous);
            $("#next").addEventListener("click", app.carousel.next);
            app.selected = $(".selected");
        },
        state: {},
    };
    app.carousel.init();
})();
