/**

* Template Name: Rames - Restaurant Cafe Responsive HTML Template
* Version: 1.0
* Author: HidraTheme 
* Developed By: HidraTheme  
* Author URL: https://themeforest.net/user/hidratheme

NOTE: This is the custom js file for the template

**/

(function ($) {
	"use strict";

	/*=================== PRELOADER ===================*/

	$(window).on("load", function () {
		$(".preloading").fadeOut("slow", function () {
			this.remove();
		});
	});

	/*=================== TOP NAVIGATION =================== */

	$("button.navbar-toggle").on("click", function () {
		$("body").toggleClass("open-mobile-menu");
	});

	$("ul.dropdown-menu [data-toggle=dropdown]").on("click", function (event) {
		event.preventDefault();
		event.stopPropagation();
		$(this).parent().siblings().removeClass("open");
		$(this).parent().toggleClass("open");
	});

	// ======================= HOMEPAGE SLIDER  ======================= //

	if ($("#home-slider").length > 0) {
		$("#home-slider").owlCarousel({
			dots: false,
			loop: true,
			autoplay: true,
			slideSpeed: 2000,
			margin: 0,
			responsiveClass: true,
			nav: false,
			navText: [
				'<i class="fa fa-angle-left" aria-hidden="true"></i>',
				'<i class="fa fa-angle-right" aria-hidden="true"></i>',
			],
			responsive: {
				0: {
					items: 1,
					nav: true,
				},
				480: {
					items: 1,
					nav: true,
				},
				600: {
					items: 1,
					nav: true,
				},
				1000: {
					items: 1,
					nav: true,
					loop: true,
					margin: 0,
				},
			},
		});
	}

	// ======================= HOMEPAGE SLIDER ANIMATE.CSS  ======================= //

	// Declare Carousel jquery object
	var owl = $("#home-slider");

	// Carousel initialization
	owl.owlCarousel({
		loop: true,
		margin: 0,
		navSpeed: 500,
		nav: true,
		items: 1,
	});

	// add animate.css class(es) to the elements to be animated
	function setAnimation(_elem, _InOut) {
		// Store all animationend event name in a string.
		// cf animate.css documentation
		var animationEndEvent =
			"webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";

		_elem.each(function () {
			var $elem = $(this);
			var $animationType = "animated " + $elem.data("animation-" + _InOut);

			$elem.addClass($animationType).one(animationEndEvent, function () {
				$elem.removeClass($animationType); // remove animate.css Class at the end of the animations
			});
		});
	}

	// Fired before current slide change
	owl.on("change.owl.carousel", function (event) {
		var $currentItem = $(".owl-item", owl).eq(event.item.index);
		var $elemsToanim = $currentItem.find("[data-animation-out]");
		setAnimation($elemsToanim, "out");
	});

	// Fired after current slide has been changed
	owl.on("changed.owl.carousel", function (event) {
		var $currentItem = $(".owl-item", owl).eq(event.item.index);
		var $elemsToanim = $currentItem.find("[data-animation-in]");
		setAnimation($elemsToanim, "in");
	});

	// ======================= HOMEPAGE FOOD MENU  ======================= //

	if ($("#foodmenu").length > 0) {
		$("#foodmenu").owlCarousel({
			dots: false,
			loop: true,
			autoplay: true,
			slideSpeed: 2000,
			margin: 0,
			responsiveClass: true,
			nav: true,
			navText: [
				'<i class="fa fa-angle-left" aria-hidden="true"></i>',
				'<i class="fa fa-angle-right" aria-hidden="true"></i>',
			],
			responsive: {
				0: {
					items: 1,
					nav: true,
				},
				480: {
					items: 1,
					nav: true,
				},
				600: {
					items: 2,
					nav: true,
				},
				768: {
					items: 3,
					nav: true,
				},
				1000: {
					items: 4,
					nav: true,
					loop: true,
					margin: 0,
				},
				1200: {
					items: 4,
					nav: true,
					loop: true,
					margin: 0,
				},
			},
		});
	}

	// ======================= PROMO  ======================= //
	// if ($("#left-promo").length > 0) {
	// 	$("#left-promo").owlCarousel({
	// 		dots: true,
	// 		loop: true,
	// 		autoplay: true,
	// 		slideSpeed: 1000,
	// 		margin: 0,
	// 		responsiveClass: true,
	// 		nav: false,
	// 		navText: [
	// 			'<i class="fa fa-angle-left" aria-hidden="true"></i>',
	// 			'<i class="fa fa-angle-right" aria-hidden="true"></i>',
	// 		],
	// 		responsive: {
	// 			0: {
	// 				items: 1,
	// 				nav: true,
	// 			},
	// 			480: {
	// 				items: 1,
	// 				nav: true,
	// 			},
	// 			600: {
	// 				items: 1,
	// 				nav: true,
	// 			},
	// 			1000: {
	// 				items: 1,
	// 				nav: true,
	// 			},
	// 		},
	// 	});
	// }

	// ======================= TESTIMONIAL  ======================= //
	if ($("#testimonial").length > 0) {
		$("#testimonial").owlCarousel({
			dots: true,
			loop: true,
			autoplay: true,
			slideSpeed: 2000,
			margin: 0,
			responsiveClass: true,
			nav: false,
			navText: [
				'<i class="fa fa-angle-left" aria-hidden="true"></i>',
				'<i class="fa fa-angle-right" aria-hidden="true"></i>',
			],
			responsive: {
				0: {
					items: 1,
					nav: false,
				},
				480: {
					items: 1,
					nav: false,
				},
				600: {
					items: 1,
					nav: false,
				},
				1000: {
					items: 1,
					nav: false,
				},
			},
		});
	}

	// ======================= STELLAR  ======================= //
	$(function () {
		$.stellar({
			horizontalScrolling: false,
			verticalOffset: 40,
		});
	});

	/*=================== STICKY MENU ===================*/

	$(window).scroll(function () {
		if (jQuery(this).scrollTop() > 50) {
			$("header").addClass("sticky");
		} else {
			$("header").removeClass("sticky");
		}
	});

	/*=================== ACTIVE MENU ===================*/
	$(".navbar-nav > li a").on("click", function () {
		$(".navbar-nav").find("li.active").removeClass("active");
		$(this).parents("li").addClass("active");
	});

	// ======================= JQUERY FOR SCROLLING FEATURE ======================= //
	$("a.page-scroll").on("click", function (event) {
		var $anchor = $(this);
		$("html, body")
			.stop()
			.animate(
				{
					scrollTop: $($anchor.attr("href")).offset().top,
				},
				1500,
				"easeInOutExpo"
			);
		event.preventDefault();
	});

	// ======================= COUNTER NUMBER  ======================= //
	$("#counter").on("inview", function (
		event,
		visible,
		visiblePartX,
		visiblePartY
	) {
		if (visible) {
			$(this)
				.find(".count")
				.each(function () {
					var $this = $(this);
					$({ Counter: 0 }).animate(
						{ Counter: $this.text() },
						{
							duration: 12000,
							easing: "swing",
							step: function () {
								$this.text(Math.ceil(this.Counter));
							},
						}
					);
				});
			$(this).unbind("inview");
		}
	});

	/*=================== GALLERY FILTERING FUCTION  ===================*/
	// $(".filter-button").on("click", function() {
	//     var value = $(this).attr('data-filter');

	//     if(value == "gallery-no-filter")
	//     {
	//         $('.gallery-img-box').removeClass("gallery-hidden");
	//     }
	//     else
	//     {
	//         $(".gallery-img-box").not('.'+value).addClass("gallery-hidden");
	//         $('.gallery-img-box').filter('.'+value).removeClass("gallery-hidden");

	//     }
	// });

	// $('.filter-gallery .filter-button').on("click", function() {
	//     $('.filter-gallery').find('.filter-button.active').removeClass('active');
	//     $(this).addClass('active');
	// });

	/*=================== GALLERY FUNCTIONS ===================*/
	let myPlayer;
	let videoPlayerEl = `<video id="video-gallery" autoplay class="video-js" controls preload="auto" data-setup='{}'>
	<p class="vjs-no-js">
		To view this video please enable JavaScript, and consider upgrading to a
		web browser that
		<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
	</p>
</video>`;

	$("#image-gallery").on("hidden.bs.modal", function (e) {
		$("#image-gallery-image").hide();
		myPlayer.dispose();
	});

	loadGallery(true, "a.viewthumb");

	function disableButtons(counter_max, counter_current) {
		$("#show-previous-image, #show-next-image").show();
		if (counter_max == counter_current) {
			$("#show-next-image").hide();
		} else if (counter_current == 1) {
			$("#show-previous-image").hide();
		}
	}

	function loadGallery(setIDs, setClickAttr) {
		var current_image,
			selector,
			counter = 0;

		function updateGallery(selector) {
			var $sel = selector;
			current_image = $sel.data("image-id");
			// $('#image-gallery-caption').text($sel.data('caption'));
			// $('#image-gallery-title').text($sel.data('title'));
			const regx = /video\/.+/;
			const fileType = $sel.data("file-type");
			const fileSource = $sel.data("media");
			if (myPlayer) {
				if (!myPlayer.isDisposed()) {
					myPlayer.dispose();
				}
			}
			$("#image-gallery-image").hide();

			if (regx.test(fileType)) {
				$("#media-container").append(videoPlayerEl);
				myPlayer = videojs(document.querySelector("#video-gallery"), {
					controls: true,
					responsive: true,
					sources: [
						{
							src: fileSource,
							type: fileType,
						},
					],
				});

				myPlayer.ready(function () {
					myPlayer.play();
				});
			} else {
				$("#image-gallery-image").show();
				$("#image-gallery-image").attr("src", fileSource);
			}

			disableButtons(counter, $sel.data("image-id"));
		}

		$("#show-next-image, #show-previous-image").on("click", function () {
			$("#image-gallery-image").hide();
			if ($(this).attr("id") == "show-previous-image") {
				current_image--;
			} else {
				current_image++;
			}

			selector = $('[data-image-id="' + current_image + '"]');
			updateGallery(selector);
		});

		if (setIDs == true) {
			$("[data-image-id]").each(function () {
				counter++;
				$(this).attr("data-image-id", counter);
			});
		}
		$(setClickAttr).on("click", function () {
			updateGallery($(this));
		});
	}

	/*=================== DATE PICKER ===================*/
	$("#datepicker").datepicker({
		uiLibrary: "bootstrap",
	});

	/*=================== TIME PICKER ===================*/
	$("#timepicker3").timepicker({
		minuteStep: 5,
		showInputs: false,
		disableFocus: true,
	});

	/*======================= GO TO TOP FUCTION  =======================*/
	$(window).scroll(function () {
		if ($(this).scrollTop() > 50) {
			$("#back-to-top").fadeIn();
		} else {
			$("#back-to-top").fadeOut();
		}
	});
	// scroll body to 0px on click
	$("#back-to-top").on("click", function () {
		$("#back-to-top").tooltip("hide");
		$("body,html").animate(
			{
				scrollTop: 0,
			},
			800
		);
		return false;
	});

	$("#back-to-top").tooltip("show");
})(jQuery);
