(function ($) {
	'use strict';

	// Template Helper Function
	$.fn.hasAttr = function(attribute) {
		var obj = this;

		if (obj.attr(attribute) !== undefined) {
			return true;
		} else {
			return false;
		}
	};

	function checkVisibility (object) {
		var el = object[0].getBoundingClientRect(),
			wHeight = $(window).height(),
			scrl =  wHeight - (el.bottom - el.height),
			condition = wHeight + el.height;

		if (scrl > 0  && scrl < condition) {
			return true;
		} else {
			return false;
		}
	};

	// Scroll Events
	var keys = {37: 1, 38: 1, 39: 1, 40: 1};
	function preventDefault(e) {
		e = e || window.event;
		if (e.preventDefault)
			e.preventDefault();
		e.returnValue = false;
	};

	function preventDefaultForScrollKeys(e) {
	    if (keys[e.keyCode]) {
	        preventDefault(e);
	        return false;
	    }
	};

	function disableScroll() {
		if (window.addEventListener) window.addEventListener('DOMMouseScroll', preventDefault, false);
		window.onwheel = preventDefault; // modern standard
		window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
		window.ontouchmove  = preventDefault; // mobile
		document.onkeydown  = preventDefaultForScrollKeys;
	};

	function enableScroll() {
		if (window.removeEventListener) window.removeEventListener('DOMMouseScroll', preventDefault, false);
		window.onmousewheel = document.onmousewheel = null;
		window.onwheel = null;
		window.ontouchmove = null;
		document.onkeydown = null;
	};

	var teslaThemes = {
		init: function () {
			this.weatherAPI();
			this.stickyHeader();
			this.checkInputsForValue();
			this.nrOnlyInputs();
			this.slickInit();
			this.parallaxInit();
			this.toggles();
			this.tabsInit();
			this.googleMaps();
			this.calendarInit();
		},

		// Template Custom Functions
		weatherAPI: function () {
			var lat,
				lon,
				city,
				country,
				icon = $('[data-weather-icon]'),
				weatherIcons,
				weatherData,
				APIKey = 'af60c4fdd1bca77a3d2b036828c809a9';

			// Get user position 
            function getGeoLocation () {
                city = geoplugin_city();
                country = geoplugin_countryCode();
                lat = geoplugin_latitude();
                lon = geoplugin_longitude();
            }

            function defineIcon (input) {
                var res;

                switch (input) {
                    case '01d':
                    case '01n':
                        res = 'sun';
                        break;

                    case '02d':
                    case '02n':
                        res = 'cloudSun';
                        break;

                    case '03d':
                    case '03n':
                    case '04d':
                    case '04n':
                        res = 'cloud';
                        break;

                    case '09d':
                    case '09n':
                        res = 'cloudDrizzleAlt';
                        break;

                    case '10d':
                    case '10n':
                        res = 'cloudDrizzleSunAlt';
                        break;

                    case '11d':
                    case '11n':
                        res = 'cloudLightning';
                        break;

                    case '13d':
                    case '13n':
                        res = 'cloudSnowAlt';
                        break;

                    case '50d':
                    case '50n':
                        res = 'cloudFog';
                        break;

                    default:
                        res = 'cloudSun';
                }

                return '<svg version="1.1" viewBox="15 15 70 70">' + $(weatherIcons).find('#' + res).html() + '</svg>'
            }

            function loadWeather () {
            	$.ajax({
            		url: 'http://api.openweathermap.org/data/2.5/weather?&lat=' + lat + '&lon=' + lon + '&appid=' + APIKey + '&units=metric',
            		dataType: 'json',
            		success: function (data) {
            			weatherData = data;

            			// Display Weather Data on Site
            			displayWeather();
            		},
            		error: function (x,y,z) {
            			console.log(x,y,z);
            		}
            	});
            }

            function displayWeather () {
            	var monthsArray = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            		fullDate = new Date (weatherData.dt * 1000),
            		date = fullDate.getDate(),
            		month = monthsArray[fullDate.getMonth()],
            		year = fullDate.getFullYear();

            	// Display Degrees
            	$('.main-header .weather-block .degrees').html(weatherData.main.temp);

            	// Display Location
            	$('.main-header .weather-block .location').html(city + ', ' + country);

            	// Display Current Date
            	$('.main-header .weather-block .date').html(date + ' ' + month + ' ' + year);

            	// Display Weather Icon
            	$('.main-header .weather-block .weather-icon').html(defineIcon(weatherData.weather[0].icon));
            }

			if (icon.length) {
				$.ajax({
                    url: 'css/vendors/weather-icons.svg',
                    success: function(data) {
                        weatherIcons = data;

                        // Get Location Data
                        getGeoLocation();

                        // Load Weather Data based on location
                        loadWeather();
                    },
                    error: function (x,y, z) {
                        console.log(x, y, z);
                    }
                });
			}
		},

		stickyHeader: function () {
			if ($('.main-header').hasClass('sticky')) {
				$(window).on('scroll', function () {
					var st = $(this).scrollTop();

					if (st > $('.main-header').outerHeight(true)) {
						$('.main-header').addClass('fixed');
					} else {
						$('.main-header').removeClass('fixed');
					}
				});
			}
		},

		checkInputsForValue: function () {
			$(document).on('focusout', '.check-value', function () {
				var text_val = $(this).val();
				if (text_val === "" || text_val.replace(/^\s+|\s+$/g, '') === "") {
					$(this).removeClass('has-value');
				} else {
					$(this).addClass('has-value');
				}
			});
		},

		nrOnlyInputs: function () {
			$('.nr-only').keypress(function (e) {
				if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
					return false;
				}
			});
		},

		slickInit: function () {
			// Get All Carousels from the page
			var carousel = $('.tt-carousel');

			// Get All Sliders from the page
			var slider = $('.tt-slider');

			// Init Carousels
			// carousel.each(function () {
			// 	var obj = $(this),
			// 		items = obj.find('.carousel-items');
			//
			// 	items.slick({
			// 		focusOnSelect: obj.hasAttr('data-focus-on-select') ? obj.data('focus-on-select') : false,
			// 		speed: obj.hasAttr('data-speed') ? obj.data('speed') : 450,
			// 		slidesToShow: obj.hasAttr('data-items-desktop') ? obj.data('items-desktop') : 4,
			// 		arrows: obj.hasAttr('data-arrows') ? obj.data('arrows') : true,
			// 		dots: obj.hasAttr('data-dots') ? obj.data('dots') : true,
			// 		infinite: obj.hasAttr('data-infinite') ? obj.data('infinite') : false,
			// 		slidesToScroll: obj.hasAttr('data-items-to-slide') ? obj.data('items-to-slide') : 1,
			// 		initialSlide: obj.hasAttr('data-start') ? obj.data('start') : 0,
			// 		asNavFor: obj.hasAttr('data-as-nav-for') ? obj.data('as-nav-for') : '',
			// 		centerMode: obj.hasAttr('data-center-mode') ? obj.data('center-mode') : false,
			// 		vertical: obj.hasAttr('data-vertical') ? obj.data('vertical') : false,
			// 		responsive: [
            //             {
            //                 breakpoint: 1200,
            //                 settings: {
            //                     slidesToShow: obj.hasAttr('data-items-small-desktop') ? obj.data('items-small-desktop') : 3,
            //                     slidesToScroll: obj.hasAttr('data-items-small-desktop') ? obj.data('items-small-desktop') : 3
            //                 }
            //             },
            //             {
            //                 breakpoint: 800,
            //                 settings: {
            //                     slidesToShow: obj.hasAttr('data-items-tablet') ? obj.data('items-tablet') : 2,
            //                     slidesToScroll: obj.hasAttr('data-items-tablet') ? obj.data('items-tablet') : 2
            //                 }
            //             },
            //             {
            //                 breakpoint: 600,
            //                 settings: {
            //                     slidesToShow: obj.hasAttr('data-items-phone') ? obj.data('items-phone') : 2,
            //                     slidesToScroll: obj.hasAttr('data-items-phone') ? obj.data('items-phone') : 2
            //                 }
            //             }
            //         ]
			// 	});
			// });

			// Init Sliders
			slider.each(function () {
				var obj = $(this),
					items = obj.find('.slides-list');

				items.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					focusOnSelect: obj.hasAttr('data-focus-on-select') ? obj.data('focus-on-select') : false,
					autoplay: obj.hasAttr('data-autoplay') ? obj.data('autoplay') : false,
					autoplaySpeed: obj.hasAttr('data-autoplay-speed') ? obj.data('autoplay-speed') : 2000,
					pauseOnHover: obj.hasAttr('data-pause-on-hover') ? obj.data('pause-on-hover') : true,
					fade: obj.hasAttr('data-fade') ? obj.data('fade') : false,
					dots: obj.hasAttr('data-dots') ? obj.data('dots') : true,
					speed: obj.hasAttr('data-speed') ? obj.data('speed') : 500,
					arrows: obj.hasAttr('data-arrows') ? obj.data('arrows') : true,
					infinite: obj.hasAttr('data-infinite') ? obj.data('infinite') : false,
					initialSlide: obj.hasAttr('data-start') ? obj.data('start') : 0,
					asNavFor: obj.hasAttr('data-as-nav-for') ? obj.data('as-nav-for') : ''					
				});
			});
		},

		parallaxInit: function () {
			var container = jQuery('[data-parallax-bg]');

			if (container.length) {
				container.each(function(index) {
					var boxImg = container.eq(index),
						boxImgData = boxImg.data('parallax-bg'),
						parallaxBox = boxImg.find('.box-img > span');

					parallaxBox.css({
						'background-image': 'url("' + boxImgData + '")'
					});

					function parallaxEffect () {
						var elCont = container[index],
							el = elCont.getBoundingClientRect(),
							wHeight = jQuery(window).height(),
							scrl =  wHeight-(el.bottom - el.height),
							scrollBox = boxImg.find('.box-img'),
							condition = wHeight+el.height,
							progressCoef = scrl/condition;

						if( scrl > 0  && scrl < condition) {
							scrollBox.css({
								transform: 'translateY('+(progressCoef * 100)+'px)'
							});
						}
					}

					parallaxEffect();

					jQuery(window).scroll(function() {
						parallaxEffect();
					});
				});
			}
		},

		toggles: function () {
			// Set Pricing Tables Background
			$('.pricing-table').each(function () {
				var obj = $(this);
				obj.css({
					'background-image': 'url(' + obj.data('table-bg') + ')'
				});
			});

			// Select Boxes
			$('.select-box').each(function () {
				var selectBox = $(this);

				selectBox.find('input').on('click', function () {
					$('.select-box').not(selectBox).removeClass('open');
					$('.form-input.calendar').removeClass('open');
					selectBox.toggleClass('open');

					return false;
				});

				selectBox.find('.select-values .select-value').on('click', function () {
					selectBox.find('input').attr('value', $(this).text()).addClass('has-value');
					selectBox.addClass('filled');
				});
			});

			$('.select-box').on('click', function (e) {
				e.stopPropagation();
			});

			$(document).on('click', function () {
				$('.select-box').removeClass('open');
			});

			// Mobile Nav Toggle
			$('.mobile-menu-toggle').on('click', function () {
				$('body').toggleClass('mobile-nav-visibile');
				return false;
			});

			$('.main-header .main-nav').on('click', function (e) {
				if ($(window).width() < 992) {
					e.stopPropagation();
				}
			});

			$(document).on('click', function () {
				$('body').removeClass('mobile-nav-visibile');
			});

			// Mobile Submenus

			$('.main-header .main-nav li.menu-item-has-children > a').on('click', function (e) {
				var obj = $(this);

				if ($(window).width() < 992) {
					e.preventDefault();
					obj.parent().toggleClass('active');
					obj.next().slideToggle(250);
				}
			});
		},

		tabsInit: function () {
			var tabs = $('.tabed-content');

			tabs.each(function () {
				var tab = $(this),
					option = tab.find('.tabs-header .tab-link'),
					content = tab.find('.tab-item');

				option.on('click', function () {
					var obj = $(this);

					if (!obj.hasClass('current')) {
						option.removeClass('current');
						obj.addClass('current');

						if (tabs.hasClass('gallery-tabs')) {
							tab.addClass('switching');

							setTimeout(function () {
								content.removeClass('current');
								$('#' + obj.data('tab-link')).addClass('current');

								tabs.removeClass('switching');
							}, 1795);
						} else {
							content.removeClass('current');
							$('#' + obj.data('tab-link')).addClass('current');
						}
					}
				});
			});
		},

		accordionInit: function () {
			var accordion = $('.accordion-group');

			accordion.each(function () {
				var accordion = $(this).find('.accordion-box');

				accordion.each(function () {
					var obj = $(this),
						header = $(this).find('.box-header h4'),
						body = $(this).find('.box-body');

					header.on('click', function () {
						if (obj.hasClass('open')) {
							body.velocity('slideUp', {
								duration: 150,
								complete: function () {
									obj.removeClass('open');
								}
							});
						} else {
							obj.addClass('open');
							body.velocity('slideDown', {duration: 195});
						}
					});
				});
			});
		},

		googleMaps: function () {
			// Describe Google Maps Init Function
			function initialize_contact_map (customOptions) {
                var mapOptions = {
                        center: new google.maps.LatLng(customOptions.map_center.lat, customOptions.map_center.lon),
                        zoom: parseInt(customOptions.zoom),
                        scrollwheel: false,
                        disableDefaultUI: true,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        styles: [{ stylers: [{saturation: -100 }]}]
                    };
                var contact_map = new google.maps.Map($('#map-canvas')[0], mapOptions),
                    marker = new google.maps.Marker({
                        map: contact_map,
                        position: new google.maps.LatLng(customOptions.marker_coord.lat, customOptions.marker_coord.lon),
                        animation: google.maps.Animation.DROP,
                        icon: customOptions.marker,
                    });
            }

            if ($('#map-canvas').length) {
            	var customOptions = $('#map-canvas').data('options');
                google.maps.event.addDomListener(window, 'load', initialize_contact_map(customOptions));
            }
		},

		calendarInit: function () {
			if ($('.widget_room_book').length) {
				$('.widget_room_book #calendar-target').datepicker({
					beforeShowDay: function (date) {
						var currentDate = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
						if ($.inArray(currentDate, $(this).data('booked-rooms')) !== -1) {
							return [true, 'booked-room'];
						} else {
							return [true, '']
						}
					}
				});
			}

			if ($('#calendar-checkin').length) {
				$('#calendar-checkin').datepicker({
					onSelect: function (dateText, Object) {
						$(this).prev().attr('value', dateText);
						$(this).parent().removeClass('open');
					}
				});
			}

			if ($('#calendar-checkout').length) {
				$('#calendar-checkout').datepicker({
					onSelect: function (dateText, Object) {
						$(this).prev().attr('value', dateText);
						$(this).parent().removeClass('open');
					}
				});
			}

			$('.form-input.calendar').each(function () {
				var obj = $(this),
					trigger = obj.find('input');

				trigger.on('click', function () {
					$('.form-input.calendar, .select-box').removeClass('open');
					obj.addClass('open');

					return false;
				});
			});

			$('.form-input.calendar').on('click', function (e) {
				e.stopPropagation();
			});

			$(document).on('click', function () {
				$('.form-input.calendar').removeClass('open');
			});
		}
	};

	$(document).ready(function(){
		teslaThemes.init();

		setTimeout(function () {
			$('body').addClass('dom-ready');
		}, 300);
	});
}(jQuery));


$('.carousel-items ').slick({
	infinite: true,
	slidesToShow: 4,
	// slidesToScroll: 3
	responsive: [
	            {
	                breakpoint: 1200,
	                settings: {
	                    slidesToShow:  3,
	                    slidesToScroll: 3
	                }
	            },
	            {
	                breakpoint: 800,
	                settings: {
	                    slidesToShow:  2,
	                    slidesToScroll:  2
	                }
	            },
	            {
	                breakpoint: 600,
	                settings: {
	                    slidesToShow:2,
	                    slidesToScroll:2
	                }
	            }
	        ]
});
