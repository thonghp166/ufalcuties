document.addEventListener("DOMContentLoaded", function () {
	
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

	var homelayer = document.querySelector(".homelayer");
	homelayer.onclick = function () {
		var excelimport = document.querySelector(".excelimport"), layer = document.querySelector(".homelayer");
		excelimport.classList.remove("showimport");
		layer.classList.remove("showlayer");

		var normalimport = document.querySelector(".normalimport"), layer = document.querySelector(".homelayer");
		normalimport.classList.remove("showimport");
		layer.classList.remove("showlayer");
	}

}, false);