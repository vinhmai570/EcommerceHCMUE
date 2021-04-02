function swap(image) {
    "use strict";
    var widthwindow1 = $(window).width();
    document.getElementById("image").src = image.href;
    if (widthwindow1 >= 1024) {
        $('#image').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair",
            zoomWindowFadeIn: 375,
            zoomWindowFadeOut: 375
        });
    };
};

function slider_owl(slider_id, visible1, visible2, visible3, visible4, visible) {
    $(slider_id).owlCarousel({
        navigation: true, // Show next and prev buttons   
        slideSpeed: 500,
        singleItem: true,
        pagination: true,
        autoplay: visible,
        margin: 20,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        loop: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: visible1,
            },

            480: {
                items: visible2,

            },

            767: {
                items: visible3,
            },

            1025: {
                items: visible4,
            }
        }
    });
};
$(document).ready(function() {
    if ($(".tp-banner").length) {
        $('.tp-banner-ver1').revolution({
            delay: 9000,
            startwidth: 1170,
            startheight: 750,
            hideThumbs: 10,
            fullWidth: "on",
            forceFullWidth: "on",
            navigationType: "bullet",
        });
        $('.tp-banner-ver2').revolution({
            delay: 9000,
            startwidth: 1170,
            startheight: 1080,
            hideThumbs: 10,
            fullWidth: "on",
            forceFullWidth: "on",
            navigationType: "bullet",
        });
        $('.tp-banner-ver3').revolution({
            delay: 9000,
            startwidth: 1170,
            startheight: 575,
            hideThumbs: 10,
            fullWidth: "on",
            forceFullWidth: "on",
        });

    }
    if ($(".product-img-box #image-view").length) {
        var widthwindow1 = $(window).width();
        if (widthwindow1 >= 1024) {
            $('#image').elevateZoom({
                zoomType: "inner",
                cursor: "crosshair",
                zoomWindowFadeIn: 375,
                zoomWindowFadeOut: 375
            });
        };
    };

    // googleMap
    if ($("#googleMap").length) {

        function initialize1() {
            // Center
            var center = new google.maps.LatLng(21.0311448, 105.7640188);

            // Map Options      
            var mapOptions = {
                zoom: 15,
                center: center,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [{
                    "featureType": "landscape",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 65
                    }, {
                        "visibility": "on"
                    }]
                }, {
                    "featureType": "poi",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 51
                    }, {
                        "visibility": "simplified"
                    }]
                }, {
                    "featureType": "road.highway",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "visibility": "simplified"
                    }]
                }, {
                    "featureType": "road.arterial",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 30
                    }, {
                        "visibility": "on"
                    }]
                }, {
                    "featureType": "road.local",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 40
                    }, {
                        "visibility": "on"
                    }]
                }, {
                    "featureType": "transit",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "visibility": "simplified"
                    }]
                }, {
                    "featureType": "administrative.province",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "lightness": -25
                    }, {
                        "saturation": -100
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "hue": "#ffff00"
                    }, {
                        "lightness": -25
                    }, {
                        "saturation": -97
                    }]
                }],
            };
            var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
            var marker = new Marker({
                map: map,
                position: new google.maps.LatLng(21.0311448, 105.7640188),
                icon: {
                    path: MAP_PIN,
                    fillColor: '#000000',
                    fillOpacity: 1,
                    strokeColor: '',
                    strokeWeight: 0
                },
                map_icon_label: '<span class="map-icon map-icon-point-of-interest"></span>'
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize1);
    }
    if ($("#googleMap2").length) {

        function initialize() {
            // Center
            var center = new google.maps.LatLng(21.0311448, 105.7640188);

            // Map Options      
            var mapOptions = {
                zoom: 15,
                center: center,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [{
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "saturation": 36
                    }, {
                        "color": "#000000"
                    }, {
                        "lightness": 40
                    }]
                }, {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "color": "#000000"
                    }, {
                        "lightness": 16
                    }]
                }, {
                    "featureType": "all",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#000000"
                    }, {
                        "lightness": 20
                    }]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#000000"
                    }, {
                        "lightness": 17
                    }, {
                        "weight": 1.2
                    }]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#000000"
                    }, {
                        "lightness": 20
                    }]
                }, {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#000000"
                    }, {
                        "lightness": 21
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#000000"
                    }, {
                        "lightness": 17
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#000000"
                    }, {
                        "lightness": 29
                    }, {
                        "weight": 0.2
                    }]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#000000"
                    }, {
                        "lightness": 18
                    }]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#000000"
                    }, {
                        "lightness": 16
                    }]
                }, {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#000000"
                    }, {
                        "lightness": 19
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#000000"
                    }, {
                        "lightness": 17
                    }]
                }],
            };
            var map = new google.maps.Map(document.getElementById('googleMap2'), mapOptions);
            var marker = new Marker({
                map: map,
                position: new google.maps.LatLng(21.0311448, 105.7640188),
                icon: {
                    path: MAP_PIN,
                    fillColor: '#d1af2e',
                    fillOpacity: 1,
                    strokeColor: '',
                    strokeWeight: 0
                },
                map_icon_label: '<span class="map-icon map-icon-point-of-interest"></span>'
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    }
    // Tabs
    $(".tab-content").hide();
    $(".tab-content:first").show();
    $("ul.tabs1 li:first").addClass("active");
    $("ul.tabs1 li").on("click",function(){
        $("ul.tabs1 li").removeClass("active");
        $(this).addClass("active");
        $(".tab-content1").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();
    });
    // End tabs
    $(".tab-content1").hide();
    $(".tab-content1:first").show();
    $("ul.tabs li:first").addClass("active");
    $("ul.tabs li").on("click",function(){
        $("ul.tabs li").removeClass("active");
        $(this).addClass("active");
        $(".tab-content").hide().removeClass("active");
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn().addClass("active");
    });
    // End tabs
    $(".tab-content2").hide();
    $(".tab-content2:first").show();
    $("ul.tabs2 li:first").addClass("active");
    $("ul.tabs2 li").on("click",function(){
        $("ul.tabs2 li").removeClass("active");
        $(this).addClass("active");
        $(".tab-content2").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();
    });
    // Slider products
    var owl = $(".product-tab-content");
    $(window).on("orientationchange load resize", function() {
        owl.css({
            "width": $(".container").width() + "px"
        });
    });
    owl.css({
        "width": $(".container").width() + "px"
    });

    var owl1 = $(".blog-post-inner");
    $(window).on("orientationchange load resize", function() {
        owl1.css({
            "width": $(".container").width() + "px"
        });
    });
    owl1.css({
        "width": $(".container").width() + "px"
    });
    $(".slide-product-tab").owlCarousel({
        navigation: true, // Show next and prev buttons   
        slideSpeed: 500,
        singleItem: true,
        pagination: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        autoplay: false,
        margin: 30,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        loop: true,
        items: 1,
    });
    $(".slide-product-tab1").owlCarousel({
        navigation: true, // Show next and prev buttons   
        slideSpeed: 500,
        singleItem: true,
        pagination: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        autoplay: false,
        margin: 90,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        loop: true,
        items: 1,
        responsive: {
            767: {
                margin: 20
            },

            1025: {
                margin: 90
            }
        }
    });
    $(".slide-product-images").each(function() {
        var carousel = $(this);
        carousel.owlCarousel({
            items: 1,
            loop: true,
            smartSpeed: 450,
        });
    });
    // Slider
    slider_owl(".blog-post-inner", 1, 2, 2, 3, false);
    slider_owl(".slider-brand", 2, 3, 4, 6, false);
    $(".upsell-product").owlCarousel({
        navigation: true, // Show next and prev buttons   
        slideSpeed: 500,
        singleItem: true,
        pagination: true,
        autoplay: false,
        margin: 0,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        loop: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },

            480: {
                items: 2,

            },

            767: {
                items: 3,
            },

            1025: {
                items: 4,
            }
        }
    });

    // Add Class dropdown-menu
    $(window).on("orientationchange load resize", function() {
        var widthwindow = $(window).width();
        if (widthwindow > 1024) {
            $(".home-v2 .forcefullwidth_wrapper_tp_banner").after($(".mega-menu.mega-menu-v2 "));
            $(".mega-menu .sub-menu").addClass("dropdown-menu");
            $(".header-v3 .menu-top li.level-1 .menu-level2").addClass("dropdown-menu");
        } else {
            $(".header-v3 .menu-top li.level-1 .menu-level2").removeClass("dropdown-menu");
            $(".mega-menu .sub-menu").removeClass("dropdown-menu");
            $(".home-v2 .forcefullwidth_wrapper_tp_banner").before($(".mega-menu.mega-menu-v2 "));
        }
    });

    $('.owl-controls .owl-prev').html('<i class="fa fa-angle-left"></i>');
    $('.owl-controls .owl-next').html('<i class="fa fa-angle-right"></i>');
    // Click to Hover
    $('.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).fadeIn().toggleClass("hover");
        $(this).toggleClass("active");
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).fadeOut().toggleClass("hover");
        $(this).toggleClass("active");
    });
    // click to zoom
    $(".product-img-box .thumb-content li:first-child").addClass("active");
    $(".product-img-box .thumb-content li").on("click",function(){
        $(".product-img-box .thumb-content li").removeClass("active");
        $(this).addClass("active");
    });

    // Click Icon Menu Mobile
    $(".icon-menu-mobile").on("click",function(event){
        event.stopPropagation();
        $(this).toggleClass("active");
        $("body").toggleClass("open-menu");
        $(".menu-mobile").toggleClass("open");
    });
    $("#header").on("click",function(event){
        event.stopPropagation();
    });
    $("body").on("click",function(){
        $(".icon-menu-mobile").removeClass("active");
        $("body").removeClass("open-menu");
        $(".menu-mobile").removeClass("open");
    });
    $(".billing-info-menu").hide();
    $(".ship-adress").on("click",function(){
        $(this).toggleClass("active");
        $(".billing-info-menu").slideToggle();
    });
    $('li:has(ul)').addClass('hassub');
    $('li:has(img)').addClass('images');
    $(".menu-mobile .hassub a").after("<p class='icon-click'></p>");
    // Mobile menu click
    $('li.level2 .icon-click').addClass('icon-click-v2');
    $('.icon-click-v2').removeClass("icon-click");
    $(".menu-mobile .icon-click-v2").on("click",function(event){
        $(".menu-mobile .menu-level-2").not($(this).next()).slideUp();
        $(".menu-mobile .icon-click-v2").not($(this)).removeClass("active");
        $(".menu-mobile .icon-click-v2").not($(this)).prev().removeClass("active");
        $(this).toggleClass("active");
        $(this).prev().toggleClass("active");
        $(this).next(".menu-level-2").slideToggle();
    });

    $(".menu-mobile .icon-click").on("click",function(){
        $(".menu-mobile .menu-level-1").not($(this).next()).slideUp();
        $(".menu-mobile .icon-click").not($(this)).removeClass("active");
        $(".menu-mobile .icon-click").not($(this)).prev().removeClass("active");
        $(this).toggleClass("active");
        $(this).prev().toggleClass("active");
        $(this).next(".menu-level-1").slideToggle();
    });
    // End mobile menu click
    $(".ordering .list").on("click",function(){
        $(this).toggleClass("active");
        $(".products").addClass("list-item");
        $(".ordering .col").removeClass("active");
    });
    $(".ordering .col").on("click",function(){
        $(this).toggleClass("active");
        $(".products").removeClass("list-item");
        $(".ordering .list").removeClass("active");
    });
    $('.widget:has(.menu)').addClass('hassub');

    $(".widget.hassub h4").on("click",function(){
        $(this).toggleClass("active");
        $(this).next(".menu").slideToggle();
    });
    $(".check").click(function() {
       $(this).toggleClass("active"); 
    });
    $(".close-popup").click(function() {
       $('.newsletterpopup').hide(); 
    });

    $("ul.product-categories li.hassub a").after('<i class="fa fa-plus"></i>');
    $("ul li.hassub i").on("click",function(){
        $(this).next().slideToggle();
        $(this).toggleClass("active");
        $(this).parent().toggleClass("active");
    });
    $("#header .fa-bars").on("click",function(){
        $(".megamenu-v2").addClass("show-ef");
    });

    $(".megamenu-v2 .fa-times").on("click",function(){
        $(".megamenu-v2").removeClass("show-ef");
    });
    $(".slide-show-ver1 .tp-bullets .bullet:nth-child(1)").text("1");
    $(".slide-show-ver1 .tp-bullets .bullet:nth-child(2)").text("2");
    $(".slide-show-ver1 .tp-bullets .bullet:nth-child(3)").text("3");
    $(".slide-show-ver3 .tp-bullets .bullet:nth-child(1)").text("1");
    $(".slide-show-ver3 .tp-bullets .bullet:nth-child(2)").text("2");
    $(".slide-show-ver3 .tp-bullets .bullet:nth-child(3)").text("3");


    // End google map
    /* event more-views click see big image. */
    $("form.cart .qtyplus").on("click",function(){
        var currentVal = parseInt($('form.cart input.qty').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('form.cart input.qty').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('form.cart input.qty').val(1);
        }
    });
    $("form.cart .qtyminus").on("click",function(){
        var currentVal = parseInt($('form.cart input.qty').val());
        // If is not undefined
        if (!isNaN(currentVal) && currentVal > 1) {
            // Increment
            $('form.cart input.qty').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('form.cart input.qty').val(1);
        }
    });
    $('.btn-vertical-slider').on('click', function() {
        if ($(this).attr('data-slide') == 'next') {
            $('#myCarousel').carousel('next');
        }
        if ($(this).attr('data-slide') == 'prev') {
            $('#myCarousel').carousel('prev')
        }
    });
    // 1) ASSIGN EACH 'DOT' A NUMBER
    dotcount = 1;
    $('.slide-product-images .owl-dot').each(function() {
        $(this).addClass('dotnumber' + dotcount);
        $(this).attr('data-info', dotcount);
        dotcount = dotcount + 1;
    });

    // 2) ASSIGN EACH 'SLIDE' A NUMBER
    slidecount = 1;
    $('.slide-product-images .owl-item').not('.cloned').each(function() {
        $(this).addClass('slidenumber' + slidecount);
        slidecount = slidecount + 1;
    });
    // SYNC THE SLIDE NUMBER IMG TO ITS DOT COUNTERPART (E.G SLIDE 1 IMG TO DOT 1 BACKGROUND-IMAGE)
    $('.slide-product-images .owl-dot').each(function() {
        grab = $(this).data('info');
        slidegrab = $('.slidenumber' + grab + ' img').attr('src');
        $(this).css("background-image", "url(" + slidegrab + ")");
    });
    if ($('.wow').length > 0) {
        wow = new WOW({
            animateClass: 'animated',
            offset: 200,
        });
        wow.init();
    }
});