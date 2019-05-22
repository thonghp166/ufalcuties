<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>uFaculties Welcome</title>
    <link rel="shortcut icon" href="{{URL::asset('images/favicon.ico')}}" />
    <link rel="stylesheet" href="{{URL::asset('css/welcome.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet"> 
    <script type="text/javascript" src="{{URL::asset('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/welcome.js')}}"></script>
</head>
<body>
    <div class="menu">
        <div class="row">
            <div class="col-sm-6">
                <a href="" class="logo">
                    <img src="{{URL::asset('images/logo-outline.png')}}" alt="uFaculties's Logo">
                    <p>uFaculties</p>
                </a>
            </div>
            <div class="col-sm-6 feature">
                <ul>
                    <li class="home">Trang chủ</li>
                    <li class="department"><a href="{{ url('/department') }}">Đơn vị</a></li>
                    <li class="field"><a href="{{url('/field')}}">Lĩnh vực nghiên cứu</a></li>
                    <li class="teacher"><a href="{{ url('/staff') }}">Giảng viên<a></li>
                    <li class="signin"><a href="{{ url('/') }}">Đăng nhập</a></li>
                </ul>
            </div> 
        </div>        
    </div>
    <div class="banner">
        <div class="slide1">
            <div class="background">
                <img src="{{URL::asset('images/webv1.jpg')}}"  alt="banner image">
            </div>
            <div class="layout"></div>
            <div class="title">
                <p>Đây là uFaculties</p>
            </div>
            <div class="content">
                <p>Tra cứu thông tin giảng viên tiện lợi, nhanh chóng, đầy đủ</p>
            </div>
            <div class="button">
                <a href="">Tìm kiếm</a>
            </div>
        </div>       
        
    </div>
</body>
</html>