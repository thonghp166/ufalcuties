document.addEventListener("DOMContentLoaded", function () {
	
	var changeavatar = document.getElementById("changeavatarbutton");
	changeavatar.onclick = function () {
		 var layer = document.getElementsByClassName("layer"), avatar = document.getElementsByClassName("changeavatar");
		 layer[0].classList.add('show');
		 avatar[0].classList.add('show');
	}

	var cancel = document.getElementById("cancel");
	cancel.onclick =function () {
		var layer = document.getElementsByClassName("layer"), avatar = document.getElementsByClassName("changeavatar");
		 layer[0].classList.remove('show');
		 avatar[0].classList.remove('show');
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