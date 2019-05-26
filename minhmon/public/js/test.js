document.addEventListener("DOMContentLoaded", function () {
	
	var button = document.getElementById("click");
	var content = document.getElementById("result");
			
	

	

	button.onclick = function () {
		console.log('hello');
		var request = new XMLHttpRequest();
		request.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				content.innerHTML = this.responseText;
			} else {
				content.innerHTML = "ERROR";
			}
		}

		request.open("GET", "test", true);
		request.send();
	}

}, false);