// javascript for field

document.addEventListener("DOMContentLoaded", function () {
	
	var boxparent = document.getElementsByClassName("rootparent");
	for (var i = 0; i < boxparent.length; i++) {
		boxparent[i].style.marginLeft = '100px';
	}

	for (var i = 0; i < idArr.length; i++) {
		var parent = document.querySelector(".box" + childArr[i]);
		var box = document.createElement("div");
		box.setAttribute("class", "box box" + idArr[i]);
		var boxmargin = 30;
		box.style.marginLeft = boxmargin + 'px';
		
		var dropdownicon = document.createElement("i");
		dropdownicon.setAttribute("class", "dropdownicon");
		var element = document.createElement("input");
		element.setAttribute("type", "checkbox");
		element.setAttribute("id", "_" + idArr[i]);
		element.setAttribute("name", "_" + idArr[i]);
		var text = document.createTextNode(nameArr[i]);
		box.appendChild(dropdownicon);
		box.appendChild(element);
		box.appendChild(text);
		parent.appendChild(box);
	}

	for (var i = 0; i < allId.length; i++) {
		var result = find(allId[i], allParent);
		if (result == true) {
			var boxelement = document.querySelector(".box" + allId[i] + " .dropdownicon");
			boxelement.setAttribute("class", "dropdownicon fas fa-plus-circle");
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
}, false);