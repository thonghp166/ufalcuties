document.addEventListener("DOMContentLoaded", function () {

	var btn = document.getElementById('importexcel');
	console.log(btn);
	btn.onclick = function(){
		var excel = document.getElementById('file');
		// var formData = new FormData(document.getElementById('excel'));
		var formData = new FormData();
		formData.append('filexxx','mmm');
		var meta_arr = document.getElementsByTagName('meta');
		var token = meta_arr[3].getAttribute('content');
		// var token = document.get('meta[name=csrf-token]').attr('content');
		formData.append('file', excel.files[0]);
		var boundary = "-------boundary";
		console.log(excel.files[0]);

		newrequest = new XMLHttpRequest();
		newrequest.open("POST",'upload.php',true);

		newrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		newrequest.setRequestHeader('Content-type','multipart/form-data');
        newrequest.setRequestHeader("Content-Type", "multipart/form-data; boundary=" + boundary);
        newrequest.setRequestHeader("Cache-Control", "no-cache");
		newrequest.setRequestHeader('X-CSRF-Token', token);


		newrequest.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				alert(this.response);
			} else {
				console.log('error');
			}
		}
		newrequest.send(formData);
		console.log(newrequest);
		
	}
}, false);