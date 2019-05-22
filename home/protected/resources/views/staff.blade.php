<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách giảng viên</title>
	<link rel="stylesheet" href="{{URL::asset('css/welcome.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}">
</head>
<body>
	<div class="elements">
		@foreach ($staff as $a)
		<div class="item">
                   <a href="" class="cover">
                       <img src="{{URL::asset('images/hungpn.jpg')}}" alt="">
                   </a>
                   <a href="" class="info">
                     <i class="fas fa-info-circle"><span> Chi tiết</span></i>
                   </a>
                   <div class="transperant"></div>
                   <div class="moredetails">
                     <h5>Tên giảng viên: {{$a->name}}</h5>
                     <h6>Mã giảng viên: {{$a->code}}</h6>
                     <h6>Chức vụ: {{$a->staff_type}}</h6>
                   </div>
               </div>
		@endforeach               
    </div>
	
</body>
</html>