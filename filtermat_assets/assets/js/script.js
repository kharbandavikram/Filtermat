(function($) {	
	"use strict";
	
	
	//1.Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(200).fadeOut(500);
		}
	}	
	
	//2.Update header style + Scroll to Top
	function headerStyle() {
		if($('.main-header').length){
			var windowpos = $(window).scrollTop();
			if (windowpos >= 150) {
				$('.main-header').addClass('fixed-header');
				$('.scroll-to-top').fadeIn(300);
			} else {
				$('.main-header').removeClass('fixed-header');
				$('.scroll-to-top').fadeOut(300);
			}
		}
	}	
	headerStyle();
	
	//3.Submenu Dropdown Toggle
	if($('.main-header li.dropdown ul').length){
		$('.main-header li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
		
		//Dropdown Button
		$('.main-header li.dropdown .dropdown-btn').click('click', function() {
			$(this).prev('ul').slideToggle(500);
		});
				
		//Disable dropdown parent link
		$('.navigation li.dropdown > a').click('click', function(e) {
			e.preventDefault();
		});
	}

	//7.Search Popup
	if ($('#search-popup').length) {
		//Show Popup
		$('.search_option').on('click', function() {
			$('#search-popup').addClass('popup-visible');
		});
		//Hide Popup
		$('.close-search').on('click', function() {
			$('#search-popup').removeClass('popup-visible');
		});
	}	
	
	//5.Revolution slider
	function revolutionSliderActiver () {
		if ($('.rev_slider_wrapper #slider1').length) {
			jQuery("#slider1").revolution({
				sliderType:"standard",
				sliderLayout:"auto",
				dottedOverlay:"yes",
				delay:5000,
				navigation: {
					arrows:{enable:true,
							left: {
	                        h_align: "left",
	                        v_align: "center",
	                        h_offset: 40,
	                        v_offset: 0
	                    },
	                    right: {
	                        h_align: "right",
	                        v_align: "center",
	                        h_offset: 40,
	                        v_offset: 0
	                    }

					} 
				}, 
				responsiveLevels: [1240, 767, 450, 300],
	            gridwidth: [1170, 940, 720, 480],
	            gridheight: [760, 650, 550, 500],
	            lazyType: "none",
	            parallax: {
	                type: "mouse",
	                origo: "slidercenter",
	                speed: 2000,
	                levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
	            },
	            shadow: 0,
	            spinner: "off",
	            stopLoop: "off",
	            stopAfterLoops: -1,
	            stopAtSlide: -1,
	            shuffle: "off",
	            autoHeight: "off",
	            hideThumbsOnMobile: "off",
	            hideSliderAtLimit: 0,
	            hideCaptionAtLimit: 0,
	            hideAllCaptionAtLilmit: 0,
	            debugMode: false,
	            fallbacks: {
	                simplifyAll: "off",
	                nextSlideOnWindowFocus: "off",
	                disableFocusListener: false,
	            }
			});
		};
	}
	
	//Gallery Filters
	if($('.filter-list').length){
		$('.filter-list').mixItUp({});
	}

	//8.Sortable Masonary with Filters
	function enableMasonry() {
		if($('.sortable-masonry').length){
	
			var winDow = $(window);
			// Needed variables
			var $container=$('.sortable-masonry .items-container');
			var $filter=$('.filter-btns');
	
			$container.isotope({
				filter:'*',
				 masonry: {
					columnWidth : 0 
				 },
				animationOptions:{
					duration:500,
					easing:'linear'
				}
			});
			
	
			// Isotope Filter 
			$filter.find('li').click(function(){
				var selector = $(this).attr('data-filter');
	
				try {
					$container.isotope({ 
						filter	: selector,
						animationOptions: {
							duration: 500,
							easing	: 'linear',
							queue	: false
						}
					});
				} catch(err) {
	
				}
				return false;
			});
	
	
			winDow.bind('resize', function(){
				var selector = $filter.find('li.active').attr('data-filter');

				$container.isotope({ 
					filter	: selector,
					animationOptions: {
						duration: 500,
						easing	: 'linear',
						queue	: false
					}
				});
			});
	
	
			var filterItemA	= $('.filter-btns li');
	
			filterItemA.click('click', function(){
				var $this = $(this);
				if ( !$this.hasClass('active')) {
					filterItemA.removeClass('active');
					$this.addClass('active');
				}
			});
		}
	}	
	enableMasonry();

	//9.Scroll to a Specific Div
	if($('.scroll-to-target').length){
		$(".scroll-to-target").on('click', function() {
			var target = $(this).attr('data-target');
		   // animate
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
			 }, 1000);	
		});
	}

	//10.PieChart RoundCircle
	function expertizeRoundCircle () {
		var rounderContainer = $('.piechart');
		if (rounderContainer.length) {
			rounderContainer.each(function () {
				var Self = $(this);
				var value = Self.data('value');
				var size = Self.parent().width();
				var color = Self.data('fg-color');

				Self.find('span').each(function () {
					var expertCount = $(this);
					expertCount.appear(function () {
						expertCount.countTo({
							from: 1,
							to: value*100,
							speed: 3000
						});
					});

				});
				Self.appear(function () {					
					Self.circleProgress({
						value: value,
						size: 142,
						thickness: 10,
						emptyFill: '#24c4f4',
						animation: {
							duration: 3000
						},
						fill: {
							color: color
						}
					});
				});
			});
		};
	}

	//11.progressBarConfig
	function progressBarConfig () {
	  var progressBar = $('.progress');
	  if(progressBar.length) {
	    progressBar.each(function () {
	      var Self = $(this);
	      Self.appear(function () {
	        var progressValue = Self.data('value');

	        Self.find('.progress-bar').animate({
	          width:progressValue+'%'           
	        }, 100);

	        Self.find('span.value').countTo({
	          from: 0,
	            to: progressValue,
	            speed: 100
	        });
	      });
	    })
	  }
	}

	//12.Fact Counter
	function factCounter() {
		if($('.fact-counter').length){
			$('.fact-counter .counter-column.animated').each(function() {
		
				var $t = $(this),
					n = $t.find(".count-text").attr("data-stop"),
					r = parseInt($t.find(".count-text").attr("data-speed"), 10);
					
				if (!$t.hasClass("counted")) {
					$t.addClass("counted");
					$({
						countNum: $t.find(".count-text").text()
					}).animate({
						countNum: n
					}, {
						duration: r,
						easing: "linear",
						step: function() {
							$t.find(".count-text").text(Math.floor(this.countNum));
						},
						complete: function() {
							$t.find(".count-text").text(this.countNum);
						}
					});
				}
				
			});
		}
	}

	//Jquery Tabs Box
	if($('.tabs-box').length){
		//Tabs
		$('.tabs-box .tab-buttons .tab-btn').click(function(e) {
			
			e.preventDefault();
			var target = $($(this).attr('href'));
			
			target.parents('.tabs-box').children('.tab-buttons').children('.tab-btn').removeClass('active-btn');
			$(this).addClass('active-btn');
			target.parents('.tabs-box').children('.tab-content').children('.tab').fadeOut(0);
			target.parents('.tabs-box').children('.tab-content').children('.tab').removeClass('active-tab');
			$(target).fadeIn(300);
			$(target).addClass('active-tab');
		});		
	}

	//13.Accordion Box
	function accordion() {
	    if($('.accordion-box').length){
	        $(".accordion-box").on('click', '.accord-btn', function() {

	            if($(this).hasClass('active')!==true){
	            $('.accordion .accord-btn').removeClass('active');

	            }

	            if ($(this).next('.accord-content').is(':visible')){
	                $(this).removeClass('active');
	                $(this).next('.accord-content').slideUp(500);
	            }else{
	                $(this).addClass('active');
	                $('.accordion .accord-content').slideUp(500);
	                $(this).next('.accord-content').slideDown(500);	
	            }
	        });	
	    }
	}
	
	//13.Sponsors Slider
	if ($('.sponsors-slider').length) {
		$('.sponsors-slider').owlCarousel({
			loop:true,
			margin:120,
			nav:true,
			smartSpeed: 400,
			autoplay: 4000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				300:{
					items:1
				},
				400:{
					items:2
				},
				800:{
					items:3
				},
				1200:{
					items:5
				}
			}
		});    		
	}

	//15.Four Column Carousel Slider
	if ($('.four-column-carousel').length) {
		$('.four-column-carousel').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:3
				},
				1070:{
					items:4
				}
			}
		});    		
	}
	
	//16.Three Column Carousel Slider
	if ($('.testimonials-slide').length) {
		$('.testimonials-slide').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:1
				},
				800:{
					items:1
				},
				1000:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});    		
	}
	
	//17.Two Column Carousel Slider
	if ($('.two-column-carousel').length) {
		$('.two-column-carousel').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				1200:{
					items:2
				}
			}
		});    		
	}
	
	//18.Single Item Slider
	if ($('.single-item-carousel').length) {
		$('.single-item-carousel').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			smartSpeed: 700,
			autoplay: 4000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});    		
	}	

	
	if ($('.content-box .bxslider').length) {
		$('.content-box .bxslider').bxSlider({
	        nextSelector: '.content-box #slider-next',
	        prevSelector: '.content-box #slider-prev',
	        nextText: '<i class="fa fa-angle-right"></i>',
	        prevText: '<i class="fa fa-angle-left"></i>',
	        mode: 'fade',
	        auto: 'true',
	        speed: '700',
	        pagerCustom: '.content-box .slider-pager .thumb-box'
	    });
	};

	
	//21.Contact Form Validation
	if($("#contact-form").length){
	    $("#contact-form").validate({
	        submitHandler: function(form) {
	          var form_btn = $(form).find('button[type="submit"]');
	          var form_result_div = '#form-result';
	          $(form_result_div).remove();
	          form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
	          var form_btn_old_msg = form_btn.html();
	          form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
	          $(form).ajaxSubmit({
	            dataType:  'json',
	            success: function(data) {
	              if( data.status = 'true' ) {
	                $(form).find('.form-control').val('');
	              }
	              form_btn.prop('disabled', false).html(form_btn_old_msg);
	              $(form_result_div).html(data.message).fadeIn('slow');
	              setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
	            }
	          });
	        }
	    });
	}

	//22.Add Comment Form Validation
	if($("#add-comment-form").length){
	    $("#add-comment-form").validate({
	        submitHandler: function(form) {
	          var form_btn = $(form).find('button[type="submit"]');
	          var form_result_div = '#form-result';
	          $(form_result_div).remove();
	          form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
	          var form_btn_old_msg = form_btn.html();
	          form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
	          $(form).ajaxSubmit({
	            dataType:  'json',
	            success: function(data) {
	              if( data.status = 'true' ) {
	                $(form).find('.form-control').val('');
	              }
	              form_btn.prop('disabled', false).html(form_btn_old_msg);
	              $(form_result_div).html(data.message).fadeIn('slow');
	              setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
	            }
	          });
	        }
	    });
	}

	//23.Appoinment Form Validation
	if($("#appoinment-form").length){
	    $("#appoinment-form").validate({
	        submitHandler: function(form) {
	          var form_btn = $(form).find('button[type="submit"]');
	          var form_result_div = '#form-result';
	          $(form_result_div).remove();
	          form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
	          var form_btn_old_msg = form_btn.html();
	          form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
	          $(form).ajaxSubmit({
	            dataType:  'json',
	            success: function(data) {
	              if( data.status = 'true' ) {
	                $(form).find('.form-control').val('');
	              }
	              form_btn.prop('disabled', false).html(form_btn_old_msg);
	              $(form_result_div).html(data.message).fadeIn('slow');
	              setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
	            }
	          });
	        }
	    });
	}
		
	//24.Gallery Popup Hide / Show
	if($('.has-gallery-popup').length){
		//Show Gallery Popup
		$('.has-gallery-popup').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('href'));
			$('body').addClass('popup-visible');
			$(target).addClass('now-visible');
		});
		
		//Show Gallery Popup
		$('.gallery-box .btn-close,.gallery-box .bg-fade-layer').click('click', function() {
			$('.gallery-box').removeClass('now-visible');
			$('body').removeClass('popup-visible');
		});		
	}

	//25.Gallery Popup Slider / Vertical Gallery Slider
	if($('.vertical-slider').length) {
		var slider = new MasterSlider();
		slider.setup('masterslider' , {
			width:850,
			height:470,
			space:10,
			view:'basic',
			dir:'v'
		});
		slider.control('arrows');	
		slider.control('scrollbar' , {dir:'v'});	
		slider.control('circletimer' , {color:"#FFFFFF" , stroke:9});
		slider.control('thumblist' , {autohide:false ,dir:'v'});
	}	
	
	//26.Appointment Calendar
	if($('#appoinment_calendar').length) {
		$('#appoinment_calendar').monthly();
	}

	// Language switcher
	function languageSwitcher() {
	    if ($("#polyglot-language-options").length) {
	        $('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
	            effect: 'slide',
	            animSpeed: 150,
	            testMode: true,
	            onChange: function(evt) {
                    alert("The selected language is: " + evt.selectedItem);
                }

	        });
	    };
	}

	//27.Select menu 
	function selectDropdown() {
	    if ($(".selectmenu").length) {
	        $(".selectmenu").selectmenu();
	        var changeSelectMenu = function(event, item) {
	            $(this).trigger('change', item);
	        };
	        $(".selectmenu").selectmenu({ change: changeSelectMenu });
	    };
	}	
	
	//28.Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       false,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}


/* ========================When document is Scrollig, do===================== */
	
	$(window).scroll('scroll', function() {
		// add your functions
		(function ($) {
			headerStyle();
			factCounter();
		})(jQuery);
	});
	
/* ========================When document is loaded, do===================== */
	
	$(window).on('load', function() {
		// add your functions
		(function ($) {
			revolutionSliderActiver();
			handlePreloader();
			languageSwitcher();
			accordion();
		})(jQuery);
	});


})(window.jQuery);