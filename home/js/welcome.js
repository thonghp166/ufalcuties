$(function() {
	$('.go').click(function(event) {
		var content = $('.workunit .title');
		var fontheight = 80;
		$('html, body').animate({scrollTop: content.offset().top - fontheight}, 1000);
	});

	$('.top').click(function(event) {
		$('html, body').animate({scrollTop: 0}, 1000);
	});
});

document.addEventListener("DOMContentLoaded", function () {
	
	var check = "under100"
	window.addEventListener("scroll", function () {
		if (window.pageYOffset > 100) {
			if (check == "under100") {
				var bar = document.getElementById("bar");
				bar.classList.add("zoomin");
				check = "above100";
			}
		} else {
			if (check == "above100") {
				var bar = document.getElementById("bar");
				bar.classList.remove("zoomin");
				check = "under100";	
			}
		}
	}, false);
	
	var check1 = "under800"
	window.addEventListener("scroll", function () {
		if (window.pageYOffset > 800) {
			if (check1 == "under800") {
				var top = document.querySelector(".top");
				top.classList.add("moveleft");
				check1 = "above800";
			}
		} else {
			if (check1 == "above800") {
				var top = document.querySelector(".top");
				top.classList.remove("moveleft");
				check1 = "under800";	
			}
		}
	}, false);

}, false);