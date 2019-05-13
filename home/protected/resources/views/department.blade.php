<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách đơn vị</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class='container'>
		@foreach ($department as $d)
		<div class='row'>
			<div class='col-sm-6 col-sm-offset-3'>
				<h2>{{$d->name}}</h2>
				<p>{{$d->address}}</p>
				<p>{{$d->type}}</p>
				<p><a href="#">Read more</a></p>
			</div>
		</div>
		@endforeach
		<button><a href="{{ url('/department/new') }}">Thêm mới</a></button>
	</div>
	
</body>
</html>