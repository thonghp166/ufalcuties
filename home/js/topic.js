// javascript for topic

document.addEventListener("DOMContentLoaded", function () {
	
	var editbutton = document.getElementsByClassName("edit"),
			topic = document.getElementById("name"),
			description = document.getElementById("detail"),
			topic_id = document.getElementById("topic_id");
	for (var i = 0; i < editbutton.length; i++) {
		editbutton[i].onclick = function () {
			topic_id.value = this.getAttribute("data-id");
			topic.value = this.getAttribute("data-name");
			description.value = this.getAttribute("data-detail");
		}
	}

	var deletebutton = document.getElementsByClassName("delete");
	for (var i = 0; i < deletebutton.length; i++) {
		deletebutton[i].onclick = function () {
			var id = this.getAttribute("data-id");
			console.log(id);
		}
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

	var newtopic = document.getElementById("newtopic");
	newtopic.onclick = function () {
		
		var newrequest = new XMLHttpRequest();
		newrequest.onreadystatechange = function () {
			
			if (this.readyState == 4 && this.status == 200) {				
				console.log(this.responseText);
			} else {
				console.log('error');
			}
		}

		var name = document.getElementById("name");
		var detail = document.getElementById("detail");
		newrequest.open("GET", "http://ufaculties.vn/shit?name=" + name.value + "&detail=" + detail.value , true);
		newrequest.send();
	}
}, false);