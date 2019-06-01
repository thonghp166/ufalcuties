// javascript for staffss

document.addEventListener("DOMContentLoaded", function () {
	
	var changeavatar = document.getElementById("changeavatarbutton");
	changeavatar.onclick = function () {
		 var layer = document.querySelector(".layer"), avatar = document.querySelector(".changeavatar");
		 layer.classList.add('show');
		 avatar.classList.add('show');
	}

	var cancel = document.getElementById("cancel");
	cancel.onclick =function () {
		var layer = document.querySelector(".layer"), avatar = document.querySelector(".changeavatar");
		 layer.classList.remove("show");
		 avatar.classList.remove("show");
	}

	var editbutton = document.getElementsByClassName("edit");
	for (var i = 0; i < editbutton.length; i++) {
		editbutton[i].onclick = function () {
			var id = this.getAttribute("data-id");
			console.log(id);
		}
	}


	var deletebutton = document.getElementsByClassName("delete");
	for (var i = 0; i < deletebutton.length; i++) {
		deletebutton[i].onclick = function () {
			var id = this.getAttribute("data-id");
			console.log(id);
		}
	}

	var layer = document.querySelector(".layer");
	layer.onclick = function () {
		var avatar = document.querySelector(".changeavatar");
	 	this.classList.remove("show");
		avatar.classList.remove("show");
	}
	
	var check = "under100";
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
		formdata.append('department_id',updateform.querySelector('select').value);
		request.open('post',route('staff.update.info'));
		request.send(formdata);

		request.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var data = $.parseJSON(this.responseText);
				var status = document.querySelector(".status");
				if (data.state == "Success"){
					status.style.display = "block";
					status.innerHTML = "<div>" + "Cập nhật thông tin thành công    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
					status.style.background = "#27ae60";
				} else {
					status.style.display = "block";
					status.innerHTML = "<div>" + "Lỗi! Cập nhật thông tin thất bại    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
					status.style.background = "#c0392b";
				}
				console.log(this.response);
			} else {
				console.log('error');
			}
		};
	},false);

	
	document.getElementById('file').onchange = function(e) {
    	e.preventDefault();
    	var uploadavatarform = document.getElementById('changeavatar');
		var request = new XMLHttpRequest();
		var formdata = new FormData(uploadavatarform);
		request.open('post',route('staff.update.avatar'));
		request.send(formdata);

		request.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var data = $.parseJSON(this.responseText);
				var avatarimage = document.getElementById("avatarimage");
				var status = document.querySelector(".status");
				var layer = document.querySelector(".layer"), avatar = document.querySelector(".changeavatar");
				if (data.state == "Success"){
					var imageresponse = JSON.parse(this.responseText);
					avatarimage.setAttribute("src", "http://ufaculties.vn/"+imageresponse.img_url);
				} else {
					avatarimage.setAttribute("src", "http://ufaculties.vn/images/avatar/defaultAvatar.png");
					status.style.display = "block";
					status.innerHTML = "<div>" + "Lỗi! Thay ảnh đại diện thất bại    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
					status.style.background = "#c0392b";
				}
				layer.classList.remove("show");
				avatar.classList.remove("show");
			} else {
				console.log('error');
			}
		};
	};

	document.getElementById('deleteavatar').onclick = function(e) {
		e.preventDefault();
		var request = new XMLHttpRequest();

		request.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var data = $.parseJSON(this.responseText);
				var avatarimage = document.getElementById("avatarimage");
				var status = document.querySelector(".status");
				var layer = document.querySelector(".layer"), avatar = document.querySelector(".changeavatar");
				if (data.state == "Success"){
					avatarimage.setAttribute("src", "http://ufaculties.vn/images/avatar/defaultAvatar.png");
				} else {
					status.style.display = "block";
					status.innerHTML = "<div>" + "Lỗi! Xóa ảnh đại diện thất bại    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
					status.style.background = "#c0392b";
				}
				layer.classList.remove("show");
				avatar.classList.remove("show");
			} else {
				console.log('error');
			}
		}

		request.open("GET", route('staff.delete.avatar'), true);
		request.send();
	}
}, false);