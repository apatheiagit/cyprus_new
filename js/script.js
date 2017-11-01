/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {
  	$(function(){
  		getWeather("Limassol");
	  	$('.current-city').click(function(){
	  		$('.city-list').toggle();
	  		$('.icon-opener').toggleClass('icon-opener-open');
	  		$(this).toggleClass('city-list-open');
	  	});
	  	$('.city-list li').click(function(){
	  		$('.current-city').children('.name').text($(this).text());
	  		getWeather($(this).children('span').attr('data-city'));
	  		$('.city-list').toggle();
	  		$('.icon-opener').toggleClass('icon-opener-open');
	  		$('.current-city').toggleClass('city-list-open');
	  	});
	  	/*$('.city-list').hover(function(){}, function(){
	  		$('.city-list').hide();
	  		$('.current-city').removeClass('city-list-open');
	  	}); */	
	    $('.wrap-toggle-btn').click(function(){
	        $(this).toggleClass('mobile-toggle');
	        $('#block-menu-menu-top-menu').toggleClass('menu-mobile');
	        $('.call-back-wrap').toggle();
	    });
	    $(window).scroll(function () {
	        if ($(this).scrollTop() > 0) {
	            $('.icon-to-top').fadeIn();
	        } else {
	            $('.icon-to-top').fadeOut();
	        }
	    });
	    $('.icon-to-top').click(function () {
	        $('body,html').animate({
	            scrollTop: 0
	        }, 400);
	        return false;
	    });

	    $('.btn-enter').click(function(){
            $('.body').css('width', $('.body').css('width'));
            $('body').css('overflow-y', 'hidden');

            $('<div id="mybox_overlay"></div>')
            .css('top',$(document).scrollTop()).css('opacity','0').animate({'opacity':'0.75'},'slow').appendTo('body');
            $('<span class="lb-close"></span>').prependTo('#block-user-login');
            $('#block-user-login').show();
        });
        $(document).on('click', '#mybox_overlay', function(){
            $('.lb-close').remove();
            $(this).fadeOut('fast', function(){
                $(this).remove();
                $('body').css('overflow-y', 'auto');
                $('.body').css('width', 'auto');                
            });
            $('#block-user-login').hide();
            $('#block-search-form').hide();
            $('.map-wrapper').css('visibility','hidden');
        });        
        $(document).on('click', '.lb-close', function(){
            $(this).remove();
            $('#mybox_overlay').fadeOut('fast', function(){
                $('#mybox_overlay').remove();
                $('body').css('overflow-y', 'auto'); 
                $('.body').css('width', 'auto');               
            });
            $('#block-user-login').hide();
            $('#block-search-form').hide();
            $('.map-wrapper').css('visibility','hidden');
        });
        $('.search-buttn').click(function(){
        	$('.body').css('width', $('.body').css('width'));
        	$('body').css('overflow-y', 'hidden');
            $('<div id="mybox_overlay"></div>')
            .css('top',$(document).scrollTop()).css('opacity','0').animate({'opacity':'0.75'},'slow').appendTo('body');
            $('<span class="lb-close"></span>').prependTo('#block-search-form');
            $('#block-search-form').show();
        });
        $('.views-row-first .faq-question').addClass('open');
        $('.views-row-first .faq-answer').show();

        $('.faq-question').click(function(){
        	$('.faq-question').removeClass('open');
        	$(this).addClass('open');
        	$('.faq-answer').slideUp();
        	$(this).next().slideDown();
        });

        $('.main-filter .form-select').selectpicker();
        //$('.main-filter #edit-when-value-date').val("Выберите дату");
        
        $('#myModal').modal();

        var currentCategory = "";
        if ($('.breadcrumb').length > 0){
	        currentCategory = $('.breadcrumb span.first a').attr('href');
	        $('.breadcrumb span.first a').addClass(currentCategory.substring(1));
	    };
	    $('.articles--index').owlCarousel({
		    items: 1,
		    loop: true,
		    dots: true,
		    autoplay:true,
		    autoplayTimeout: 6000,
		    autoplaySpeed: 5000,
		    autoplayHoverPause:true,
		    animateOut: 'fadeOut',
    		animateIn: 'fadeIn',
		    /*onInitialize: function (event) {
	        if ($('.articles--index .article-item').size() <= 1) {
	           this.settings.loop = false;
	           this.settings.dotsClass = 'disable-dots';
	        }
	    	}*/
		  });
		  $('.affiche-carousel').owlCarousel({
		    items: 1,
		    loop: true,
		    dots: true,
		    onInitialize: function (event) {
	        if ($('.affiche-carousel .article-item').size() <= 1) {
	           this.settings.loop = false;
	           this.settings.dotsClass = 'disable-dots';
	        }
	    	}
		  });	
		  $('.thevideo').hide();
			$('.theimage').click(function(){
				var src = $('.thevideo iframe').attr('src');
				$('.thevideo iframe').attr('src', src+'?autoplay=1');			
				window.setTimeout(function(){
					$('.theimage').hide();
					$('.thevideo').show();
				}, 100);						
			});	 
	
		  var owl = $('.photo-carousel');
			owl.owlCarousel({
				loop: false,
				items: 1,
				dots: false
			});
			owl.on('changed.owl.carousel', function(e) {
			  if (!e.namespace || e.property.name != 'position') return
			  var current_item = e.item.index+1;
			  var current_photo = $(e.target).parent().find('.current-photo');
			  current_photo.text(current_item);
			});
			$('.customNextBtn').click(function() {
			    var current_carousel = $(this).parent().parent().parent().find('.photo-carousel');
			    current_carousel.trigger('next.owl.carousel');
			})
			$('.customPrevBtn').click(function() {
			    var current_carousel = $(this).parent().parent().parent().find('.photo-carousel');
			    current_carousel.trigger('prev.owl.carousel', [300]);
			})

			$(window).scroll(function() {
			    if ($(this).scrollTop() > 50) {
			         $('.topMenu').addClass('fixMenu');
			    } else {
			         $('.topMenu').removeClass('fixMenu');
			    }
			});

			$(document).on('click', '.prev-event', function(){
				var this_wrap = $(this).parent().parent().parent();
				var this_id = parseInt(this_wrap.attr('data-id'));
				var this_content = this_wrap.html();
				if (this_id < 3) var next_id = this_id + 1;
				else return;
				var next_wrap = $('#event_' + next_id);
				var next_content = next_wrap.html();
				this_wrap.html(next_content).attr("id", "event_" + next_id).attr('data-id', next_id);
				next_wrap.html(this_content).attr("id", "event_" + this_id).attr('data-id', this_id);
			});

			$(document).on('click', '.next-event', function(){
				var this_wrap = $(this).parent().parent().parent();
				var this_id = parseInt(this_wrap.attr('data-id'));
				var this_content = this_wrap.html();
				if (this_id > 0) var next_id = this_id - 1;
				else return;
				var next_wrap = $('#event_' + next_id);
				var next_content = next_wrap.html();
				this_wrap.html(next_content).attr("id", "event_" + next_id).attr('data-id', next_id);
				next_wrap.html(this_content).attr("id", "event_" + this_id).attr('data-id', this_id);
			});

			$('.article-content a[href*=#]').click(function(){		
					let name = $(this).attr('href'); name = name.substr(1);   	
			    $('html, body').animate({			    	
			      scrollTop: $( $('a[name='+name+']') ).offset().top - 80
			    }, 500);
			    return false;
			});	
			
			let xhr = new XMLHttpRequest();		
			let linkElement = null;	
			let lc = 0, current_link = 0;
			let isFirefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
			let isIE = !!navigator.userAgent.match(/Trident/g) || !!navigator.userAgent.match(/MSIE/g);

			$('.article-content-text a').each(function(){
				$(this).attr('id', 'link_'+lc);
				lc += 1;
			})

			$('.article-content-text a').mouseenter(function(){
				if (!isFirefox && !isIE){
					let url = $(this).attr('href');
					let lang = document.documentElement.lang;
					current_link = $(this).attr('id');
					$('.link-tooltip').remove();
					if ((url.indexOf('//cyprusfortravellers') !== -1) || (url.charAt(0) == '/')){
						getURLcontent(url, current_link, lang);
					}	
				}			
			});

			$('.article-content-text a').mouseleave(function(){
				$('.link-tooltip').remove();
			});

			function onLoadLink() {
			  let data = xhr.responseText;
			  let el = $( '<div></div>' );
				el.html(data);
				let title = $('#mainTitle', el).html();

				let pictUrl = $('#mainPhoto img', el).attr('src');

				$('<div class="tooltip tooltip-bottom link-tooltip"><div class="tooltip-inner"></div></div>').appendTo($('#'+current_link));

				$('.tooltip-inner').css('background-image', 'url('+pictUrl+')');
				$('.tooltip-inner').append('<div class="tooltip-title"></div>');
				$('.tooltip-title').html(title);
			}

  	})
  function getURLcontent(url, current_link, lang){
		$.ajax({
		  url: "/link.php",
		  data: "url="+url+'&lang='+lang,

		  success: function(data, status, xhr){	
		    console.log(xhr );	
		    $('#'+current_link).append(data);  
		  },
		  error: function (request, status, error) {
	      console.log('error');
	      console.log(request.responseText);
	    }
		})
	}  
  function getWeather(city){		
		$.ajax({
		  url: "/weather.php",
		  data: "q="+city+"&units=metric",
		  success: function(data, status, xhr){
		    weatherCallBack(data);	
		    //console.log(xhr.responseText);	  
		  },
		  error: function (request, status, error) {
        //console.log('error');
        //console.log(request.responseText);
    	}
		})		
	}
	function weatherCallBack(data){
	    var w = JSON.parse(data);
	    //console.log(w);
	    if(Array.isArray(w.weather)){   
	    	var icon = w.weather[0].icon;
	    	var temp = Math.round(w.main.temp)
	    }else{
	    	var icon = '01d';
	    	var temp = 30;
	    }
		$('.weather-icon img').attr('src', '/sites/all/themes/cyprus_new/img/weather/'+ icon +'.png');
		$('.weather-degree').text(temp);
		$('.weather').css('opacity', 1);
	   	//console.log('changeWeather');
	}

  }
};


})(jQuery, Drupal, this, this.document);
