// javascript for staffss

document.addEventListener("DOMContentLoaded", function () {
	
	var changeavatar = document.getElementById("changeavatarbutton");
	changeavatar.onclick = function () {
		 var layer = document.getElementsByClassName("layer"), avatar = document.getElementsByClassName("changeavatar");
		 layer[0].classList.add('show');
		 avatar[0].classList.add('show');
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
		request.open('post',route('staff.update.info'));
		request.send(formdata);

		request.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				$data = $.parseJSON(this.responseText);
				if ($data.state == "Success"){
					// xu ly view khi cap nhat thanh cong
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