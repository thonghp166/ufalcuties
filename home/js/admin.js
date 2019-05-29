document.addEventListener("DOMContentLoaded", function () {

	console.log(allParent);
	console.log(allId);
	console.log(idArr);
	console.log(parentArr);
	console.log(nameArr);
	
	var excelfile = document.getElementById("excelfile");
	excelfile.value = "";

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
		
		var text = document.createTextNode(" " + nameArr[i]);

		var addbutton = document.createElement("i");
		addbutton.setAttribute("class", "fas fa-plus-square");
		addbutton.setAttribute("style", "margin: 0px 5px;");
		
		var editbutton = document.createElement("i");
		editbutton.setAttribute("class", "fas fa-pen-square");
		editbutton.setAttribute("style", "margin-right: 5px;");
		
		var deletebutton = document.createElement("i");
		deletebutton.setAttribute("class", "fas fa-minus-square");
		
		field.appendChild(dropdownicon);
		field.appendChild(text);
		field.appendChild(addbutton);
		field.appendChild(editbutton);
		field.appendChild(deletebutton);
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

	var normalbutton = document.getElementById("normalimportbutton");
	normalbutton.onclick = function () {
		var normalimport = document.querySelector(".normalimport"), layer = document.querySelector(".homelayer");
		normalimport.classList.add("showimport");
		layer.classList.add("showlayer");
	}
	
	var excelbutton = document.getElementById("excelimportbutton");
	excelbutton.onclick = function () {
		var excelimport = document.querySelector(".excelimport"), layer = document.querySelector(".homelayer");
		excelimport.classList.add("showimport");
		layer.classList.add("showlayer");
	}

	var addnewdepartment = document.getElementById("addnewdepartment");
	addnewdepartment.onclick = function () {
		var departmentimport = document.querySelector(".departmentimport"), layer = document.querySelector(".homelayer");
		departmentimport.classList.add("showimport");
		layer.classList.add("showlayer");
	}

	var addnewfield = document.getElementById("addnewfield");
	addnewfield.onclick = function () {
		var fieldimport = document.querySelector(".fieldimport"), layer = document.querySelector(".homelayer");
		fieldimport.classList.add("showimport");
		layer.classList.add("showlayer");
	}

	var cancelnormalbutton = document.getElementById("cancelnormalbutton");
	cancelnormalbutton.onclick = function () {
		var normalimport = document.querySelector(".normalimport"), layer = document.querySelector(".homelayer");
		normalimport.classList.remove("showimport");
		layer.classList.remove("showlayer");
	}

	var cancelexcelbutton = document.getElementById("cancelexcelbutton");
	cancelexcelbutton.onclick = function () {
		var excelimport = document.querySelector(".excelimport"), layer = document.querySelector(".homelayer");
		excelimport.classList.remove("showimport");
		layer.classList.remove("showlayer");	
	}

	var canceldepartmentbutton = document.getElementById("canceldepartmentbutton");
	canceldepartmentbutton.onclick = function () {
		var departmentimport = document.querySelector(".departmentimport"), layer = document.querySelector(".homelayer");
		departmentimport.classList.remove("showimport");
		layer.classList.remove("showlayer");
	}

	var cancelfieldbutton = document.getElementById("cancelfieldbutton");
	cancelfieldbutton.onclick = function () {
		var fieldimport = document.querySelector(".fieldimport"), layer = document.querySelector(".homelayer");
		fieldimport.classList.remove("showimport");
		layer.classList.remove("showlayer");
	}

	var homelayer = document.querySelector(".homelayer");
	homelayer.onclick = function () {
		var layer = document.querySelector(".homelayer");
		var excelimport = document.querySelector(".excelimport");
		var normalimport = document.querySelector(".normalimport");
		var departmentimport = document.querySelector(".departmentimport");
		var fieldimport = document.querySelector(".fieldimport");

		excelimport.classList.remove("showimport");
		normalimport.classList.remove("showimport");
		departmentimport.classList.remove("showimport");
		fieldimport.classList.remove("showimport");
		layer.classList.remove("showlayer");
	}

	var excelform = document.getElementById('excelform');
	excelform.addEventListener('submit',function(e){
		var request = new XMLHttpRequest();
		e.preventDefault();
		var formdata = new FormData(excelform);
		request.open('post',route('admin.add.user.excel'));
		request.send(formdata);

		request.onreadystatechange = function(){

			if (this.readyState == 4 && this.status == 200) {
				var data = $.parseJSON(this.responseText);
				if (data.state == "Success"){
					// xu ly view khi import thanh cong
					//data.new_users list cac user moi tao
				} else {
					// xu ly view khi import loi
					// loi duoc luu trong bien data.error
				}
				console.log(data);
			} else {
				console.log('error');
			}
		};
	},false);

	var newuserform = document.getElementById('newuserform');
	newuserform.addEventListener('submit',function(e){
		var request = new XMLHttpRequest();
		e.preventDefault();
		var formdata = new FormData(newuserform);
		request.open('post',route('admin.add.user'));
		request.send(formdata);

		request.onreadystatechange = function(){

			if (this.readyState == 4 && this.status == 200) {
				$data = $.parseJSON(this.responseText);
				if ($data.state == "Success"){
					// xu ly view khi tao thanh cong
				} else {
					// xu ly view khi tao loi
					// loi duoc luu trong bien $data.error
				}
				console.log(this.response);
			} else {
				console.log('error');
			}
		};
	},false);



}, false);
