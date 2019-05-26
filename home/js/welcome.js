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
	
	var check1 = "under400"
	window.addEventListener("scroll", function () {
		if (window.pageYOffset > 400) {
			if (check1 == "under400") {
				var top = document.querySelector(".top");
				top.classList.add("moveleft");
				check1 = "above400";
			}
		} else {
			if (check1 == "above400") {
				var top = document.querySelector(".top");
				top.classList.remove("moveleft");
				check1 = "under400";	
			}
		}
	}, false);

	console.log(allParent);
	console.log(allId);
	console.log(idArr);
	console.log(parentArr);
	console.log(nameArr);

	var fieldparent = document.getElementsByClassName("field");
	
	for (var i = 0; i < fieldparent.length; i++) {
		fieldparent[i].style.marginLeft = '0px';
	}

	for (var i = 0; i < idArr.length; i++) {
		var parent = document.querySelector(".field" + parentArr[i]);
		
		var field = document.createElement("div");
		field.setAttribute("class", "col-12 field field" + idArr[i]);
		field.setAttribute("data-parent", ""+ parentArr[i] + "");
		field.setAttribute("data-id", ""+ idArr[i] + "");
		var fieldmargin = 30;
		field.style.marginLeft = fieldmargin + 'px';
		
		var dropdownicon = document.createElement("i");
		dropdownicon.setAttribute("class", "dropdownicon fas fa-ban");
		
		var name = document.createElement("a");
		name.setAttribute("href", "");
		name.setAttribute("class", "fieldelement");
		var text = document.createTextNode(" " + nameArr[i]);
		name.appendChild(text);

		field.appendChild(dropdownicon);
		field.appendChild(name);
		parent.appendChild(field);
	}

	for (var i = 0; i < allId.length; i++) {
		
		var result = find(allId[i], allParent);
		if (result == true) {
			var fieldelement = document.querySelector(".field" + allId[i] + " .dropdownicon");
			fieldelement.setAttribute("class", "dropdownicon fas fa-caret-down");
		}
	}

	var dropdown = document.querySelectorAll(".field i.dropdownicon");
	for (var i = 0; i < dropdown.length; i++) {
		dropdown[i].onclick = function () {
			if (this.getAttribute("class") != "dropdownicon fas fa-ban") {
				this.classList.toggle("fa-caret-down");
				this.classList.toggle("fa-caret-right");
				var id = this.parentNode.getAttribute("data-id");
				for (var i = 0; i < dropdown.length; i++) {
					if (dropdown[i].parentNode.getAttribute("data-parent") == id) {
						dropdown[i].parentNode.classList.toggle("hide");
					}
				}
			}
		}
	}

	
	function find (value, array) {
		for (var i = 0; i < array.length; i++) {
			if (array[i] == value) {
				return true;
			}
		}
		return false;
	}

}, false);