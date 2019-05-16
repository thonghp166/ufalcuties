$(function() {

	$(window).scroll(function(event) {
		/* Act on the event */
		if ($(window).scrollTop() > 100) {
			$('.menu').addClass('bar');
		} else {
			$('.menu').removeClass('bar');
		}

		if ($(window).scrollTop() > 700) {
			$('.top').addClass('moveleft');
		} else {
			$('.top').removeClass('moveleft');
		}

		var majorPosition = $('.major .kind').offset().top;
		if ($(window).scrollTop() >= majorPosition - 400) {
			TweenMax.to($('.major .kind'), 0.4, {x: 0, opacity: 1, ease: Bounce.easeOut});
		}

		var researchPosition = $('.research .kind').offset().top;
		if ($(window).scrollTop() >= researchPosition - 400) {
			TweenMax.to($('.research .kind'), 0.4, {x: 0, opacity: 1, ease: Bounce.easeOut});
		}	

		var teacherPosition = $('.teacher .kind').offset().top;
		if ($(window).scrollTop() >= teacherPosition - 400) {
			TweenMax.to($('.teacher .kind'), 0.4, {y: 0, opacity: 1, ease: Bounce.easeOut});
		}	

		var firtTeacherItem = $('.teacher .item:first-child').offset().top;
		if ($(window).scrollTop() >= firtTeacherItem - 600) {
			TweenMax.staggerTo($('.teacher .item'), 0.8, {y: 0, opacity: 1, ease: Expo.easeOut}, 0.4);
		}
	});	

	$('.top img').click(function(event) {
		/* Act on the event */
		$('html').animate({scrollTop: 0}, 1000);
	});
	
	$('.s1').click(function(event) {
		/* Act on the event */
		$('.active').removeClass('active');
		$('.s1').addClass('active');
		$('.slide1').animate({
			opacity: 1, 
			marginLeft: 0
		}, 1500);
		$('.slide2').animate({
			opacity: 0,
			marginLeft: 300
		}, 1000);
	});

	$('.s2').click(function(event) {
		/* Act on the event */
		$('.active').removeClass('active');
		$('.s2').addClass('active');
		$('.slide1').animate({
			opacity: 0, 
			marginLeft: -300
		}, 1000);
		$('.slide2').animate({
			opacity: 1,
			marginLeft: 0
		}, 1500);
	});

	$('.major .rightarrow').click(function(event) {
		/* Act on the event */
	    $('.major .listitem').animate({marginLeft: "-=302"}, 500);
	});
	$('.major .leftarrow').click(function(event) {
		/* Act on the event */
	    $('.major .listitem').animate({marginLeft: "+=302"}, 500);
	});

	$('.research .rightarrow').click(function(event) {
		/* Act on the event */
	    $('.research .listitem').animate({marginLeft: "-=302"}, 500);
	});
	$('.research .leftarrow').click(function(event) {
		/* Act on the event */
	    $('.research .listitem').animate({marginLeft: "+=302"}, 500);
	});

	
});