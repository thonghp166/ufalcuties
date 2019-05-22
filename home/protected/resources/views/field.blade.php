<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách lĩnh vực  nghiên cứu</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class='container'>
		@foreach ($field as $f)
		<div class='row'>
			<div class='col-sm-6 col-sm-offset-3'>
				<h2>{{$f->name}}</h2>
				<p>{{$f->childOf}}</p>
				<p><a href="#">Read more</a></p>
			</div>
		</div>
		@endforeach
	</div>
</body>
</html>