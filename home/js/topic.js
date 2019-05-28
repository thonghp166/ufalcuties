// javascript for topic

document.addEventListener("DOMContentLoaded", function () {

	var topic = document.getElementById("name"),
	    description = document.getElementById("detail"),
	    topic_id = document.getElementById("topic_id");

	topic.value = "";
	description.value = "";
	topic_id.value = "";

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

	var newtopic = document.querySelector(".newtopic");
	newtopic.onclick = function () {

		var newrequest = new XMLHttpRequest();
		
		var name = document.getElementById("name");
		var detail = document.getElementById("detail");
		if (name.value == "") {

		}

		newrequest.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var data = $.parseJSON(this.response);					
				var status = document.querySelector(".status");
				if (data.state == "Success") {
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
					editbutton.setAttribute("data-id", data.new_id);
					editbutton.setAttribute("data-name", name.value);
					editbutton.setAttribute("data-detail", detail.value);
					editbutton.setAttribute("style", "color: white!important; font-weight: normal; font-style: italic; margin-right: 5px; cursor: pointer;");
					editbutton.setAttribute("onclick", "edit(this)");
					var editicon = document.createElement("i");
					editicon.setAttribute("class", "fas fa-edit");
					var text4 = document.createTextNode(" Sửa");
					editbutton.appendChild(editicon);
					editbutton.appendChild(text4);
					col4.appendChild(editbutton);

					var deletebutton = document.createElement("span");
					deletebutton.setAttribute("class", "btn btn-danger delete");
					deletebutton.setAttribute("data-id", data.new_id);
					deletebutton.setAttribute("data-name", name.value);
					deletebutton.setAttribute("data-detail", detail.value);
					deletebutton.setAttribute("style", "color: white!important; font-weight: normal; font-style: italic; cursor: pointer;");
					deletebutton.setAttribute("onclick", "remove(this)");
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

					var row = document.querySelectorAll("#topicbody tr");
			        index = 0;
			        for (var i = 0; i < row.length; i++) {
			          if (row[i].style.display != 'none') {
			            index++;
			            console.log(row[i]);
			            row[i].cells[0].innerText = index;
			          }
			        }

					status.style.display = "block";
					status.innerHTML = "<div>" + "Thêm chủ đề quan tâm '" + name.value + "' thành công    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
					status.style.background = "#27ae60";

					var updatetopic = document.querySelector(".updatetopic");
					updatetopic.classList.remove("showbutton");
					name.value = "";
					detail.value = "";
					
					count++;
				} else {
					status.style.display = "block";
					status.innerHTML = "<div>" + "Lỗi! Chủ đề quan tâm '" + name.value + "' đã tồn tại    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
					status.style.background = "#c0392b";

					var updatetopic = document.querySelector(".updatetopic");
					updatetopic.classList.remove("showbutton");
					name.value = "";s
					detail.value = "";
				}
			} else {
				console.log('error');
			}
		}
		newrequest.open("GET", route('staff.add.topic') + "?name=" + name.value + "&detail=" + detail.value , true);
		newrequest.send();
	}

	var updatetopic = document.querySelector(".updatetopic");
	updatetopic.onclick = function() {
		var newrequest = new XMLHttpRequest();
		
		var id = document.getElementById("topic_id");
		var name = document.getElementById("name");
		var detail = document.getElementById("detail");
		newrequest.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				var data = $.parseJSON(this.response);			
				var status = document.querySelector(".status");
					if (data.state == "Success") {
					editbutton = document.getElementsByClassName("edit");
					for (var i = 0; i < editbutton.length; i++) {
						var thisname = editbutton[i].getAttribute("data-id");
						if (thisname == id.value) {
							editbutton[i].parentNode.parentNode.childNodes[3].innerHTML = "<td>"+topic.value+"</td>";
							editbutton[i].parentNode.parentNode.childNodes[5].innerHTML = "<td>"+detail.value+"</td>";
							editbutton[i].setAttribute("data-name", name.value);
							editbutton[i].setAttribute("data-detail", detail.value);
						}
					}
					status.style.display = "block";
					status.innerHTML = "<div>" + "Cập nhật thông tin chủ đề '" + name.value + "' thành công    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
					status.style.background = "#27ae60";

					var updatetopic = document.querySelector(".updatetopic");
					updatetopic.classList.remove("showbutton");
					name.value = "";
					detail.value = "";
				} else {
					status.style.display = "block";
					status.innerHTML = "<div>" + "Lỗi! Chủ đề quan tâm '" + name.value + "' với mô tả này đã tồn tại    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
					status.style.background = "#c0392b";

					var updatetopic = document.querySelector(".updatetopic");
					updatetopic.classList.remove("showbutton");
					name.value = "";
					detail.value = "";
				}
			} else {
				console.log('error');
			}
		}

		newrequest.open("GET", route('staff.update.topic') + "?id=" + id.value + "&name=" + name.value + "&detail=" + detail.value , true);
		newrequest.send();

	}
}, false);