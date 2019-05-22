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
	
}, false);