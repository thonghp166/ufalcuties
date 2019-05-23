<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/login.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/all.css')}}">
</head>
<body>
	
	<div class="background">
		<img src="{{URL::asset('images/webv1.jpg')}}" alt="" class="img-fluid backgroundimage">
		<div class="layer"></div>
		<div class="logo">
			<p>u-Faculties</p>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-3"></div>
				<div class="col-6">
					<div class="loginbox">
						<img src="{{URL::asset('images/logo-outline.png')}}" alt="" class="img-fluid logoimage">
						<p class="title">Đăng nhập u-Faculties</p>
						<form action="" class="loginform">
							<fieldset>
								<input type="email" id="acount" placeholder="Nhập email">
							</fieldset>
							<fieldset>
								<div class="line" style="width: 100%; height: 2px; background: gray; margin: 0.5px 0px;"></div>
							</fieldset>
							<fieldset>
								<input type="password" id="password" placeholder="Nhập mật khẩu">
							</fieldset>
							<div class="submit">
								
							</div>
						</form>
					</div>		
				</div>
				<div class="col-3"></div>
			</div>
		</div>
	</div>
	

	<script type="text/javascript" src="{{URL::asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/login.js')}}"></script>
</body>
</html>