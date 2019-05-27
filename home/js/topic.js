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
		
		var name = document.getElementById("name");
		var detail = document.getElementById("detail");
		
		newrequest.onreadystatechange = function () {
			
			if (this.readyState == 4 && this.status == 200) {				
				var topicbody = document.getElementById("topicbody");

				var newrow = document.createElement("tr");
				
				var col1 = document.createElement("td");
				var text1 = document.createTextNode(count);
				col1.appendChild(text1);

				var col2 = document.createElement("td");
				var text2 = document.createTextNode(name.value);
				col2.appendChild(text2);

				var col3 = document.createElement("td");
				var text3 = document.createTextNode(detail.value);
				col3.appendChild(text3);

				var col4 = document.createElement("td");
				
				var editbutton = document.createElement("span");
				editbutton.setAttribute("class", "btn btn-primary edit");
				editbutton.setAttribute("data-name", name.value);
				editbutton.setAttribute("data-detail", detail.value);
				editbutton.setAttribute("style", "color: white!important; font-weight: normal; font-style: italic; margin-right: 4px;");
				var editicon = document.createElement("i");
				editicon.setAttribute("class", "fas fa-edit");
				var text4 = document.createTextNode(" Sửa");
				editbutton.appendChild(editicon);
				editbutton.appendChild(text4);
				col4.appendChild(editbutton);

				var deletebutton = document.createElement("span");
				deletebutton.setAttribute("class", "btn btn-danger delete");
				deletebutton.setAttribute("data-name", name.value);
				deletebutton.setAttribute("data-detail", detail.value);
				deletebutton.setAttribute("style", "color: white!important; font-weight: normal; font-style: italic;");
				var deleteicon = document.createElement("i");
				deleteicon.setAttribute("class", "fas fa-trash");
				var text5 = document.createTextNode(" Xóa");
				deletebutton.appendChild(deleteicon);
				deletebutton.appendChild(text5);
				col4.appendChild(deletebutton);

				newrow.appendChild(col1);
				newrow.appendChild(col2);
				newrow.appendChild(col3);
				newrow.appendChild(col4);
				topicbody.appendChild(newrow);

				name.value = "";
				detail.value = "";
				
				count++;
			} else {
				console.log('error');
			}
		}

		newrequest.open("GET", route('staff.add.topic') + "?name=" + name.value + "&detail=" + detail.value , true);
		newrequest.send();
	}
}, false);