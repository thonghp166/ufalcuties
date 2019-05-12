<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách giảng viên</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class='container'>
		@foreach ($canbo as $a)
		<div class='row'>
			<div class='col-sm-6 col-sm-offset-3'>
				<h2>{{$a->name}}</h2>
				<p>{{$a->code}}</p>
				<p>{{$a->staff_type}}</p>
				<p><a href="#">Read more</a></p>
			</div>
		</div>
		@endforeach
	</div>
	
</body>
</html>