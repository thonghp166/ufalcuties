<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Upload file vs Ajax</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<script>
		//xử lý khi có sự kiện click
		$('#upload').on('click', function() {
			//Lấy ra files
			var file_data = $('#file').prop('files')[0];
			//lấy ra kiểu file
			var type = file_data.type;
			//Xét kiểu file được upload
			var match= ["image/gif","image/png","image/jpg",];
			//kiểm tra kiểu file
			if(type == match[0] || type == match[1] || type == match[2])
			{
				//khởi tạo đối tượng form data
				var form_data = new FormData();
				//thêm files vào trong form data
				form_data.append('file', file_data);
				//sử dụng ajax post
				$.ajax({
                url: 'upload.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                       
                type: 'post',
                success: function(res){
                	$('.status').text(res);
                	$('#file').val('');
                }
            });
			} else{
				$('.status').text('Chỉ được upload file ảnh');
                	$('#file').val('');
			}
			return false;
		});
	</script>
</body>
</html>