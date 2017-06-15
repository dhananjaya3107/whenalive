/**
 * Created by Dananjaya Mahamalage on 3/8/2017.
 */

function sticky_relocate() {
    var window_top = jQuery(window).scrollTop();
    var div_top = jQuery('#sticky-anchor').offset().top;
    if (window_top > div_top) {
        jQuery('#sticky').addClass('stick');
        jQuery('#sticky-anchor').height(jQuery('#sticky').outerHeight());
    } else {
        jQuery('#sticky').removeClass('stick');
        jQuery('#sticky-anchor').height(0);
    }
}

jQuery(function() {
    jQuery(window).scroll(sticky_relocate);
    sticky_relocate();
});

jQuery(function() {
    jQuery('.home-slide-wrap').matchHeight();
    jQuery('.retailer-item').matchHeight();
    //jQuery('.ur-toys-slider-wrap-inner').matchHeight();
});


/*
 Load more content with jQuery - May 21, 2013
 (c) 2013 @ElmahdiMahmoud
 */

jQuery(function () {
    jQuery(".retailer-item").slice(0, 8).show();
    jQuery("#loadMore").on('click', function (e) {
        jQuery(this).removeClass('animated');
        e.preventDefault();
        jQuery(".retailer-item:hidden").slice(0, 16).slideDown();
        if (jQuery(".retailer-item:hidden").length == 0) {
            jQuery("#load").fadeOut('slow');
        }
        jQuery('html,body').animate({
            scrollTop: jQuery(this).offset().top
        }, 1500);
    });
});


jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 50) {
        jQuery('.totop a').fadeIn();
    } else {
        jQuery('.totop a').fadeOut();
    }
});


jQuery(function() {
    window.sr = ScrollReveal();
    sr.reveal('.home-slide-wrap');
});


jQuery(function() {
    var owl1 = jQuery('.owl1');
    owl1.owlCarousel({
        items:1,
		rtl:true,
        loop:true,
        autoplay:true,
        autoplayTimeout:6000,
        autoplayHoverPause:true,
        autoHeight:true,
        nav:true,
        smartSpeed:900,
        navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
    });

    var owl2 = jQuery('.owl2');
    owl2.owlCarousel({
        items:1,
		rtl:false,
        loop:true,
        autoplay:true,
        autoplayTimeout:6000,
        autoplayHoverPause:true,
        autoHeight:true,
        nav:true,
        smartSpeed:900,
        navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
    });

    var owl3 = jQuery('.owl3');
    owl3.owlCarousel({
        items:1,
		rtl:true,
        loop:true,
        autoplay:true,
        autoplayTimeout:6000,
        autoplayHoverPause:true,
        autoHeight:true,
        nav:true,
        smartSpeed:900,
        navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
    });

    var owl4 = jQuery('.owl4');
    owl4.owlCarousel({
        items:1,
		rtl:false,
        loop:true,
        autoplay:true,
        autoplayTimeout:6000,
        autoplayHoverPause:true,
        autoHeight:true,
        nav:true,
        smartSpeed:900,
        navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
    });

});

jQuery('ul.nav a').each(function() {
  jQuery(this).attr('data-scroll', '');
});

jQuery(function() {
    smoothScroll.init();
});


jQuery(document).ready(function(){
	//pre load animation
	//paste this code under the head tag or in a separate js file.
	// Wait for window load
	jQuery(window).on('load', function() {
		// Animate loader off screen
		jQuery(".se-pre-con").fadeOut("slow");
	});	
});



(function($) {

	'use strict';

	/*
	 Circle Slider
	 */
	if ($.isFunction($.fn.flipshow)) {
		var circleContainer = $('.concept-slideshow');

		if (circleContainer.get(0)) {
			circleContainer.flipshow();

			setTimeout(function circleFlip() {
				circleContainer.data().flipshow._navigate(circleContainer.find('div.fc-right span:first'), 'right');
				setTimeout(circleFlip, 3000);
			}, 3000);
		}
	}

	/*
	 Move Cloud
	 */
	if ($('.cloud').get(0)) {
		var moveCloud = function() {
			$('.cloud').animate({
				'top': '+=20px'
			}, 3000, 'linear', function() {
				$('.cloud').animate({
					'top': '-=20px'
				}, 3000, 'linear', function() {
					moveCloud();
				});
			});
		};

		moveCloud();
	}

}).apply(this, [jQuery]);



jQuery('.nav a').on('click', function(){
    jQuery('.navbar-toggle').click() //bootstrap 3.x
});
