// javascript for field

document.addEventListener("DOMContentLoaded", function () {
	
	var boxparent = document.getElementsByClassName("rootparent");
	
	for (var i = 0; i < boxparent.length; i++) {
		boxparent[i].style.marginLeft = '30px';
	}

	for (var i = 0; i < idArr.length; i++) {
		var parent = document.querySelector(".box" + childArr[i]);
		var box = document.createElement("div");
		box.setAttribute("class", "box box" + idArr[i]);
		box.setAttribute("data-parent", ""+ childArr[i] + "");
		box.setAttribute("data-id", ""+ idArr[i] + "");
		var boxmargin = 30;
		box.style.marginLeft = boxmargin + 'px';
		
		var dropdownicon = document.createElement("i");
		dropdownicon.setAttribute("class", "dropdownicon fas fa-ban");
		var element = document.createElement("input");
		element.setAttribute("type", "checkbox");
		element.setAttribute("class", "checkbox");
		element.setAttribute("id", "_" + idArr[i]);
		element.setAttribute("name", "ids[]");
		element.setAttribute("value", idArr[i]);
		var text = document.createTextNode(" " + nameArr[i]);
		box.appendChild(dropdownicon);
		box.appendChild(element);
		box.appendChild(text);
		parent.appendChild(box);
	}

	for (var i = 0; i < staff_fieldArr.length; i++) {
		var checkbox = document.querySelector(".box" + staff_fieldArr[i]);
		var inputtag = checkbox.querySelector("input#_" + staff_fieldArr[i]);
		inputtag.checked = true;
	}

	function checkedEvent (checkbox) {
		var id = checkbox.parentNode.getAttribute("data-id");
		var child = 0;
		for (var i = 0; i < allId.length; i++) {
			var _checkbox = document.getElementById("_" + allId[i]);
			var parent = _checkbox.parentNode.getAttribute("data-parent");
			if (parent == id) {
				child++;
				_checkbox.checked = checkbox.checked;
				checkedEvent(_checkbox);
			}
		} 
	}

	function checkedFatherEvent (checkbox) {
		var fatherid = checkbox.parentNode.getAttribute("data-parent");
		if (fatherid != "0") {
			var father = document.getElementById("_" + fatherid);
			if (childCheckedEvent(father) > 0) {
				if (countChild(father) == childCheckedEvent(father)) {
					father.checked = true;
					father.indeterminate = false;
				} else {
					father.checked = false;
					father.indeterminate = true;
				}
			} else {
				father.checked = false;
				father.indeterminate = false;
			}
			checkedFatherEvent(father);
		}
	}

	function countChild (checkbox) {
		var id = checkbox.parentNode.getAttribute("data-id");
		var child = 0;
		for (var i = 0; i < allId.length; i++) {
			var _checkbox = document.getElementById("_" + allId[i]);
			var parent = _checkbox.parentNode.getAttribute("data-parent");
			if (parent == id) {
				child++;
			}
		}  
		return child;
	}

	function childCheckedEvent (checkbox) {
		var id = checkbox.parentNode.getAttribute("data-id");
		var childCheck = 0;
		for (var i = 0; i < allId.length; i++) {
			var _checkbox = document.getElementById("_" + allId[i]);
			var parent = _checkbox.parentNode.getAttribute("data-parent");
			if (parent == id) {
				if (_checkbox.checked == true) {
					childCheck++;
				}
			}
		} 
		return childCheck;
	}

	for (var i = 0; i < allId.length; i++) {
		
		var checkbox = document.getElementById("_" + allId[i]);
		checkbox.onchange = function () {
			checkedEvent(this);
			checkedFatherEvent(this);
		}

		var result = find(allId[i], allParent);
		if (result == true) {
			var boxelement = document.querySelector(".box" + allId[i] + " .dropdownicon");
			boxelement.setAttribute("class", "dropdownicon fas fa-caret-down");
		}
	}



	var dropdown = document.querySelectorAll(".box i.dropdownicon");
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

	var updateform = document.getElementById('staffinfor');
	updateform.addEventListener('submit',function(e){
		var request = new XMLHttpRequest();
		e.preventDefault();
		var formdata = new FormData(updateform);
		request.open('post',route('staff.update.field'));
		request.send(formdata);

		request.onreadystatechange = function(){

			if (this.readyState == 4 && this.status == 200) {
				$data = $.parseJSON(this.responseText);
				var status = document.querySelector(".status");
				if ($data.state == "Success"){
					status.style.display = "block";
					status.innerHTML = "<div>" + "Cập nhật các lĩnh vực nghiên cứu thành công    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
					status.style.background = "#27ae60";
				} else {
					status.style.display = "block";
					status.innerHTML = "<div>" + "Lỗi! Chủ đề quan tâm '" + name.value + "' đã tồn tại    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
					status.style.background = "#c0392b";
				}
			} else {
				console.log('error');
			}
		};
	},false);


}, false);