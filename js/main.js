(function ($){
	  getWeather("Limassol");
  	$('.current-city').click(function(){
  		$('.city-list').toggle();
  		$('.icon-opener').toggleClass('icon-opener-open');
  	});
  	$('.city-list li').click(function(){
  		$('.current-city').children('.name').text($(this).text());
  		getWeather($(this).children('span').attr('data-city'));
  		$('.city-list').toggle();
  		$('.icon-opener').toggleClass('icon-opener-open');
  	});
    $('.top-menu>ul>li').hover(function(){
      var width = $(this).children('a').innerWidth();
      $(this).children('a').addClass('hover');
      $(this).children('ul').width(width).slideDown();
    }, function(){
      $(this).children('a').removeClass('hover');
      $(this).children('ul').slideUp();
    });
    $('.top-menu>ul>li>ul').hover(function(){
      $(this).parent().children('a').addClass('hover');
    }, function(){
      $(this).parent().children('a').removeClass('hover');;
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
      $('#block-user-login').show();
    });

function getWeather(city){		
	$.ajax({
	  url: "http://api.openweathermap.org/data/2.5/weather",
	  data: "q="+city+"&units=metric",
	  success: function(data, status, xhr){
	    weatherCallBack(data);		  
	  }
	})		
}
function weatherCallBack(data){
    $('.weather-icon img').attr('src', 'http://openweathermap.org/img/w/'+ data.weather[0].icon +'.png');
    $('.weather-degree').text(Math.round(data.main.temp));
}
}(jQuery));
