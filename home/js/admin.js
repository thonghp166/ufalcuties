document.addEventListener("DOMContentLoaded", function () {

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

	var code = document.getElementById("code");
    var name = document.getElementById("name");
    var account = document.getElementById("account");
    var email = document.getElementById("email");
    var staff_type = document.getElementById("staff_type");
    var degree = document.getElementById("degree");
    var work_unit = document.getElementById("work_unit");
    
    code.value = "";
    name.value = "";
    account.value = "";
    email.value = "";
    staff_type.value = staff_type.querySelector("option").value;
    degree.value = degree.querySelector("option").value;
    work_unit.value = work_unit.querySelectorAll("option")[1].value;

    var excelfile = document.getElementById("excelfile");
    excelfile.value = "";

    var departmentname = document.getElementById("departmentname");
    var departmenttype = document.getElementById("departmenttype");
    var departmentaddress = document.getElementById("departmentaddress");
    var departmentphone = document.getElementById("departmentphone");
    var departmentwebsite = document.getElementById("departmentwebsite");

    departmentname.value = "";
    departmenttype.value = departmenttype.querySelector("option").value;
    departmentaddress.value = "";
    departmentphone.value = "";
    departmentwebsite.value = "";
	
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
		
		var text = document.createElement("span");
		text.innerText = nameArr[i];

		var addbutton = document.createElement("i");
		addbutton.setAttribute("class", "fas fa-plus-square");
		addbutton.setAttribute("onclick", "newfield(this)");
		addbutton.setAttribute("style", "margin: 0px 5px; cursor: pointer;");		
		
		var editbutton = document.createElement("i");
		editbutton.setAttribute("class", "fas fa-pen-square");
		editbutton.setAttribute("onclick", "editfield(this)");
		editbutton.setAttribute("style", "margin-right: 5px; cursor: pointer;");
		
		var deletebutton = document.createElement("i");
		deletebutton.setAttribute("class", "fas fa-minus-square");
		deletebutton.setAttribute("onclick", "deletefield(this)");
		deletebutton.setAttribute("style", "cursor: pointer;");
		
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
		var code = document.getElementById("code");
	    var name = document.getElementById("name");
	    var account = document.getElementById("account");
	    var email = document.getElementById("email");
	    var staff_type = document.getElementById("staff_type");
	    var degree = document.getElementById("degree");
	    var work_unit = document.getElementById("work_unit");
	    var layer = document.querySelector(".homelayer");
	    var normalimport = document.querySelector(".normalimport");

	    code.value = "";
	    name.value = "";
	    account.value = "";
	    email.value = "";
	    staff_type.value = staff_type.querySelector("option").value;
	    degree.value = degree.querySelector("option").value;
	    work_unit.value = work_unit.querySelectorAll("option")[1].value;

		normalimport.classList.remove("showimport");
		layer.classList.remove("showlayer");

		var sendstaff = document.querySelector(".sendstaff");
		sendstaff.classList.remove("hide");
		
		var editstaff = document.querySelector(".editstaff");
		editstaff.classList.remove("showbutton");
	}

	var cancelexcelbutton = document.getElementById("cancelexcelbutton");
	cancelexcelbutton.onclick = function () {
		var excelimport = document.querySelector(".excelimport");
		var layer = document.querySelector(".homelayer");
		var excelfile = document.getElementById("excelfile");

		excelimport.classList.remove("showimport");
		layer.classList.remove("showlayer");	

		excelfile.value = "";
	}

	var canceldepartmentbutton = document.getElementById("canceldepartmentbutton");
	canceldepartmentbutton.onclick = function () {
		var departmentname = document.getElementById("departmentname");
	    var departmenttype = document.getElementById("departmenttype");
	    var departmentaddress = document.getElementById("departmentaddress");
	    var departmentphone = document.getElementById("departmentphone");
	    var departmentwebsite = document.getElementById("departmentwebsite");
	    var layer = document.querySelector(".homelayer");
	    var departmentimport = document.querySelector(".departmentimport");

	    departmentname.value = "";
	    departmenttype.value = departmenttype.querySelector("option");
	    departmentaddress.value = "";
	    departmentphone.value = "";
	    departmentwebsite.value = "";
	     
	    layer.classList.remove("showlayer");
	    departmentimport.classList.remove("showimport");

	    var fieldname = document.getElementById("fieldname");
	    fieldname.value = "";

	    var editnormaldepartment = document.querySelector(".editnormaldepartment");
     	editnormaldepartment.classList.remove("showbutton");

     	var addnormaldepartment = document.querySelector(".addnormaldepartment");
     	addnormaldepartment.classList.remove("hide");
	}

	var cancelfieldbutton = document.getElementById("cancelfieldbutton");
	cancelfieldbutton.onclick = function () {
		var fieldimport = document.querySelector(".fieldimport"), layer = document.querySelector(".homelayer");
		fieldimport.classList.remove("showimport");
		layer.classList.remove("showlayer");

		var editnormalfield = document.querySelector(".editnormalfield");
    	editnormalfield.classList.remove("showbutton");

    	var addnormalfield = document.querySelector(".addnormalfield");
    	addnormalfield.classList.remove("hide");
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

		var code = document.getElementById("code");
	    var name = document.getElementById("name");
	    var account = document.getElementById("account");
	    var email = document.getElementById("email");
	    var staff_type = document.getElementById("staff_type");
	    var degree = document.getElementById("degree");
	    var work_unit = document.getElementById("work_unit");
	    
	    code.value = "";
	    name.value = "";
	    account.value = "";
	    email.value = "";
	    staff_type.value = staff_type.querySelector("option").value;
	    degree.value = degree.querySelector("option").value;
	    work_unit.value = work_unit.querySelectorAll("option")[1].value;

	    var excelfile = document.getElementById("excelfile");
	    excelfile.value = "";

	    var departmentname = document.getElementById("departmentname");
	    var departmenttype = document.getElementById("departmenttype");
	    var departmentaddress = document.getElementById("departmentaddress");
	    var departmentphone = document.getElementById("departmentphone");
	    var departmentwebsite = document.getElementById("departmentwebsite");

	    departmentname.value = "";
	    departmenttype.value = departmenttype.querySelector("option");
	    departmentaddress.value = "";
	    departmentphone.value = "";
	    departmentwebsite.value = "";

	    var sendstaff = document.querySelector(".sendstaff");
		sendstaff.classList.remove("hide");
		
		var editstaff = document.querySelector(".editstaff");
		editstaff.classList.remove("showbutton");

		var editnormaldepartment = document.querySelector(".editnormaldepartment");
     	editnormaldepartment.classList.remove("showbutton");

     	var addnormaldepartment = document.querySelector(".addnormaldepartment");
     	addnormaldepartment.classList.remove("hide");

     	var fieldname = document.getElementById("fieldname");
	    fieldname.value = "";

     	var editnormalfield = document.querySelector(".editnormalfield");
    	editnormalfield.classList.remove("showbutton");

    	var addnormalfield = document.querySelector(".addnormalfield");
    	addnormalfield.classList.remove("hide");
	}

	// ajax request to create new user by excel
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
				var excelstatus = document.querySelector(".excelstatus");
				if (data.state == "Success"){
					var userbody = document.getElementById("userbody");
					var usernames = [];
					var names = [];
					var ids = [];
					var emails = [];
					for (var i = 0; i < data.new_users.length; i++) {
						var usernamesLength = usernames.push(data.new_users[i].username);
						var namesLength = names.push(data.new_users[i].name);
						var emailsLength = emails.push(data.new_users[i].email);
						var idsLength = ids.push(data.new_users[i].id);
					}
					for (var i = 0; i < ids.length; i++) {
						var row = document.createElement("tr");
						row.setAttribute("style", "width: 100%;");

						var col1 = document.createElement("td");
						col1.setAttribute("style", "width: 5%;");
						col1.innerText = "new";

						var col2 = document.createElement("td");
						col2.setAttribute("style", "width: 10%;");
						col2.innerText = "";

						var col3 = document.createElement("td");
						col3.setAttribute("style", "width: 10%;");
						col3.innerText = names[i];

						var col4 = document.createElement("td");
						col4.setAttribute("style", "width: 10%;");
						col4.innerText = usernames[i];

						var col5 = document.createElement("td");
						col5.setAttribute("style", "width: 25%;");
						col5.innerText = emails[i];

						var col6 = document.createElement("td");
						col6.setAttribute("style", "width: 10%;");
						col6.innerText = "Giảng viên";

						var col7 = document.createElement("td");
						col7.setAttribute("style", "width: 10%;");
						col7.innerText = "CN";

						var col8 = document.createElement("td");
						col8.setAttribute("style", "width: 10%;");
						col8.innerText = "Không";

						var col9 = document.createElement("td");
						col9.setAttribute("style", "width: 10%;");

						var editbutton = document.createElement("button");
						editbutton.setAttribute("class", "btn btn-primary");
						editbutton.setAttribute("onclick", "edituser(this)");
						editbutton.setAttribute("style", "margin: 5px 5px;");
						editbutton.setAttribute("data-id", ids[i]);
						var editicon = document.createElement("i");
						editicon.setAttribute("class", "fas fa-edit");
						editbutton.appendChild(editicon);
						col9.appendChild(editbutton);

						var deletebutton = document.createElement("button");
						deletebutton.setAttribute("class", "btn btn-danger");
						deletebutton.setAttribute("onclick", "deleteuser(this)");
						deletebutton.setAttribute("style", "margin: 5px 5px;");
						deletebutton.setAttribute("data-id", ids[i]);
						var deleteicon = document.createElement("i");
						deleteicon.setAttribute("class", "fas fa-trash");
						deletebutton.appendChild(deleteicon);
						col9.appendChild(deletebutton);

						row.appendChild(col1);
						row.appendChild(col2);
						row.appendChild(col3);
						row.appendChild(col4);
						row.appendChild(col5);
						row.appendChild(col6);
						row.appendChild(col7);
						row.appendChild(col8);
						row.appendChild(col9);

						userbody.appendChild(row);
					}

					var row = document.querySelectorAll("#userbody tr");
		            index = 0;
		            for (var i = 0; i < row.length; i++) {
		              if (row[i].style.display != 'none') {
		                index++;
		                row[i].cells[0].innerText = index;
		              }
		            }
					
					var excelimport = document.querySelector(".excelimport");
					var layer = document.querySelector(".homelayer");
					var excelfile = document.getElementById("excelfile");

					excelimport.classList.remove("showimport");
					layer.classList.remove("showlayer");	

					excelfile.value = "";
				} else {
					excelstatus.style.display = "block";
					excelstatus.innerHTML = "<div>" + "Lỗi! Nhập file excel thất bại do'"+data.error+"'   <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
					excelstatus.style.background = "#c0392b";
				}
			} else {
				console.log('error');
			}
		};
	},false);

	// ajax request create or update new user
	var newuserform = document.getElementById('newuserform');
	newuserform.addEventListener('submit',function(e){
		var action = e.explicitOriginalTarget.name;
		var request = new XMLHttpRequest();
		e.preventDefault();
		var formdata = new FormData(newuserform);
		var status = document.querySelector(".status");
		if (action == 'update'){
			request.open('post', route('admin.update.user'));
			request.send(formdata);
			request.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200) {
					data = $.parseJSON(this.responseText);
					if (data.state == "Success"){
						var user_id = document.getElementById("user_id");
						console.log(user_id);
						var button = document.querySelectorAll("#userbody button");
						for (var i = 0; i < button.length; i++) {
							if (button[i].getAttribute("data-id") == user_id.value) {
								var father = button[i].parentNode.parentNode;

								father.cells[1].innerText = document.getElementById("code").value;
								father.cells[2].innerText = document.getElementById("name").value;
								father.cells[3].innerText = document.getElementById("account").value;
								father.cells[4].innerText = document.getElementById("email").value;
								father.cells[5].innerText = document.getElementById("staff_type").value;
								father.cells[6].innerText = document.getElementById("degree").options[document.getElementById("degree").selectedIndex].text;
								father.cells[7].innerText = document.getElementById("work_unit").options[document.getElementById("work_unit").selectedIndex].text;
								
								break;
							}
						}

						var code = document.getElementById("code");
					    var name = document.getElementById("name");
					    var account = document.getElementById("account");
					    var email = document.getElementById("email");
					    var staff_type = document.getElementById("staff_type");
					    var degree = document.getElementById("degree");
					    var work_unit = document.getElementById("work_unit");
					    var layer = document.querySelector(".homelayer");
					    var normalimport = document.querySelector(".normalimport");

					    code.value = "";
					    name.value = "";
					    account.value = "";
					    email.value = "";
					    staff_type.value = staff_type.querySelector("option").value;
					    degree.value = degree.querySelector("option").value;
					    work_unit.value = work_unit.querySelectorAll("option")[1].value;

						normalimport.classList.remove("showimport");
						layer.classList.remove("showlayer");

						var sendstaff = document.querySelector(".sendstaff");
						sendstaff.classList.remove("hide");
						
						var editstaff = document.querySelector(".editstaff");
						editstaff.classList.remove("showbutton");
					} else {
						status.style.display = "block";
						status.innerHTML = "<div>" + "Lỗi! Cập nhật thông tin tài khoản thất bại do '"+data.error.code+"'    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
						status.style.background = "#c0392b";
					}
					console.log(this.responseText);
				} else {
					console.log('error');
				}
			}
		} else {
			request.open('post',route('admin.add.user'));
			request.send(formdata);
			request.onreadystatechange = function(){

				if (this.readyState == 4 && this.status == 200) {
					data = $.parseJSON(this.responseText);
					var status = document.querySelector(".status");
					if (data.state == "Success"){
						var code = document.getElementById("code");
					    var name = document.getElementById("name");
					    var account = document.getElementById("account");
					    var email = document.getElementById("email");
					    var staff_type = document.getElementById("staff_type");
					    var degree = document.getElementById("degree");
					    var work_unit = document.getElementById("work_unit");
					    var layer = document.querySelector(".homelayer");
					    var normalimport = document.querySelector(".normalimport");

						var userbody = document.getElementById("userbody");

						var newrow = document.createElement("tr");
						newrow.setAttribute("style", "width: 100%;");

						var col1 = document.createElement("td");
						col1.setAttribute("style", "width: 5%;");
						col1.innerText = "new";

						var col2 = document.createElement("td");
						col2.setAttribute("style", "width: 10%;");
						col2.innerText = code.value;
						
						var col3 = document.createElement("td");
						col3.setAttribute("style", "width: 10%;");
						col3.innerText = name.value;
						
						var col4 = document.createElement("td");
						col4.setAttribute("style", "width: 10%;");
						col4.innerText = account.value;
						
						var col5 = document.createElement("td");
						col5.setAttribute("style", "width: 25%;");
						col5.innerText = email.value;
						
						var col6 = document.createElement("td");
						col6.setAttribute("style", "width: 10%;");
						col6.innerText = staff_type.value;
						
						var col7 = document.createElement("td");
						col7.setAttribute("style", "width: 10%;");
						col7.innerText = degree.value;
						
						var col8 = document.createElement("td");
						col8.setAttribute("style", "width: 10%;");
						col8.innerText = work_unit.options[work_unit.selectedIndex].text;
						
						var col9 = document.createElement("td");
						col9.setAttribute("style", "width: 10%;");
						var editbutton = document.createElement("button");
						editbutton.setAttribute("class", "btn btn-primary");
						editbutton.setAttribute("onclick", "edituser(this)");
						editbutton.setAttribute("style", "margin: 5px 5px;");
						editbutton.setAttribute("data-id", data.new_user.id);
						var editicon = document.createElement("i");
						editicon.setAttribute("class", "fas fa-edit");
						editbutton.appendChild(editicon);
						col9.appendChild(editbutton);

						var deletebutton = document.createElement("button");
						deletebutton.setAttribute("class", "btn btn-danger");
						deletebutton.setAttribute("onclick", "deleteuser(this)");
						deletebutton.setAttribute("style", "margin: 5px 5px;");
						deletebutton.setAttribute("data-id", data.new_user.id);
						var deleteicon = document.createElement("i");
						deleteicon.setAttribute("class", "fas fa-trash");
						deletebutton.appendChild(deleteicon);
						col9.appendChild(deletebutton);

						newrow.appendChild(col1);
						newrow.appendChild(col2);
						newrow.appendChild(col3);
						newrow.appendChild(col4);
						newrow.appendChild(col5);
						newrow.appendChild(col6);
						newrow.appendChild(col7);
						newrow.appendChild(col8);
						newrow.appendChild(col9);

						userbody.appendChild(newrow);

						var row = document.querySelectorAll("#userbody tr");
			            index = 0;
			            for (var i = 0; i < row.length; i++) {
			              if (row[i].style.display != 'none') {
			                index++;
			                row[i].cells[0].innerText = index;
			              }
			            }

			            code.value = "";
					    name.value = "";
					    account.value = "";
					    email.value = "";
					    staff_type.value = staff_type.querySelector("option").value;
					    degree.value = degree.querySelector("option").value;
					    work_unit.value = work_unit.querySelectorAll("option")[1].value;

						normalimport.classList.remove("showimport");
						layer.classList.remove("showlayer");
					} else {
						status.style.display = "block";
						status.innerHTML = "<div>" + "Lỗi! Thêm mới tài khoản thất bại do'"+data.error.code+"'    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
						status.style.background = "#c0392b";
					}
				} else {
					console.log('error');
				}
			}
		};
	},false);

	var sendstaff = document.querySelector(".sendstaff");

	// ajax request create or update new department
	var departmentform = document.getElementById('departmentform');
	departmentform.addEventListener('submit',function(e){
		var action = e.explicitOriginalTarget.name;
		var request = new XMLHttpRequest();
		e.preventDefault();
		var formdata = new FormData(departmentform);
		formdata.append('name',departmentform.querySelectorAll('input')[1].value);

		if (action == 'update'){
			request.open('post', route('admin.update.department'));
			request.send(formdata);
			request.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200) {
					data = $.parseJSON(this.responseText);
					if (data.state == "Success"){
						console.log(document.getElementById("department_id"));
					} else {
						var departmentstatus = document.querySelector(".departmentstatus");
						departmentstatus.style.display = "block";
						departmentstatus.innerHTML = "<div>" + "Lỗi! Cập nhật thông tin không thành công do '"+data.error+"'    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
						departmentstatus.style.background = "#c0392b";
					}
					console.log(this.responseText);
				} else {
					console.log('error');
				}
			}
		} else {
			request.open('post',route('admin.add.department'));
			request.send(formdata);
			request.onreadystatechange = function(){

				if (this.readyState == 4 && this.status == 200) {
					data = $.parseJSON(this.responseText);
					if (data.state == "Success"){
						var departmentbody = document.getElementById("departmentbody");
						var row = document.createElement("tr");
						row.setAttribute("style", "text-align: center; width: 100%;");

						var col1 = document.createElement("td");
						col1.setAttribute("style", "width: 5%;");
						col1.innerText = "new";

						var col2 = document.createElement("td");
						col2.setAttribute("style", "width: 25%;");
						col2.innerText = document.getElementById("departmentname").value;

						var col3 = document.createElement("td");
						col3.setAttribute("style", "width: 15%;");
						col3.innerText = document.getElementById("departmenttype").options[document.getElementById("departmenttype").selectedIndex].text;

						var col4 = document.createElement("td");
						col4.setAttribute("style", "width: 10%;");
						col4.innerText = document.getElementById("departmentaddress").value;

						var col5 = document.createElement("td");
						col5.setAttribute("style", "width: 10%;");
						col5.innerText = document.getElementById("departmentphone").value;

						var col6 = document.createElement("td");
						col6.setAttribute("style", "width: 25%;");
						col6.innerText = document.getElementById("departmentwebsite").value;

						var col7 = document.createElement("td");
						col7.setAttribute("style", "width: 10%");

						var editbutton = document.createElement("button");
						editbutton.setAttribute("class", "btn btn-primary");
						editbutton.setAttribute("data-id", data.id);
						editbutton.setAttribute("style", "margin: 5px 5px;");
						editbutton.setAttribute("onclick", "editdepartment(this)");
						editbutton.innerHTML = "<i class='fas fa-edit'></i>";

						var deletebutton = document.createElement("button");
						deletebutton.setAttribute("class", "btn btn-danger");
						deletebutton.setAttribute("data-id", data.id);
						deletebutton.setAttribute("onclick", "deletedepartment(this)");
						deletebutton.innerHTML = "<i class='fas fa-trash'></i>";
						col7.appendChild(editbutton);
						col7.appendChild(deletebutton);


						row.appendChild(col1);
						row.appendChild(col2);
						row.appendChild(col3);
						row.appendChild(col4);
						row.appendChild(col5);
						row.appendChild(col6);
						row.appendChild(col7);
						
						departmentbody.appendChild(row);

						var row = document.querySelectorAll("#departmentbody tr");
			            index = 0;
			            for (var i = 0; i < row.length; i++) {
			              if (row[i].style.display != 'none') {
			                index++;
			                row[i].cells[0].innerText = index;
			              }
			            }

			            var departmentname = document.getElementById("departmentname");
					    var departmenttype = document.getElementById("departmenttype");
					    var departmentaddress = document.getElementById("departmentaddress");
					    var departmentphone = document.getElementById("departmentphone");
					    var departmentwebsite = document.getElementById("departmentwebsite");
					    var layer = document.querySelector(".homelayer");
					    var departmentimport = document.querySelector(".departmentimport");

					    departmentname.value = "";
					    departmenttype.value = departmenttype.querySelector("option");
					    departmentaddress.value = "";
					    departmentphone.value = "";
					    departmentwebsite.value = "";
					     
					    layer.classList.remove("showlayer");
					    departmentimport.classList.remove("showimport");

					    var editnormaldepartment = document.querySelector(".editnormaldepartment");
				     	editnormaldepartment.classList.remove("showbutton");

				     	var addnormaldepartment = document.querySelector(".addnormaldepartment");
				     	addnormaldepartment.classList.remove("hide");
					} else {
						var departmentstatus = document.querySelector(".departmentstatus");
						departmentstatus.style.display = "block";
						departmentstatus.innerHTML = "<div>" + "Lỗi! Đơn vị thêm không thành công do '"+data.error.name+"'   <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
						departmentstatus.style.background = "#c0392b";
					}
				} else {
					console.log('error');
				}
			}
		};
	},false);
}, false);
