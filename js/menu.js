$(document).ready(function(){
	var altura = $('.headerContMenu').offset().top;
	
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('.headerContMenu').addClass('menu-fixed');
		} else {
			$('.headerContMenu').removeClass('menu-fixed');
		}
	});
 
});