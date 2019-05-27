<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/all.css')}}">
</head>
<body>

    <div class="menubar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-3" id="bar">
          <a class="navbar-brand" href="#" id="logo">
              <img src="{{URL::asset('images/logo-outline.png')}}" alt="Logo u-Faculties">
            u-Faculties
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-5">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Trang chủ<span class="sr-only">(current)</span></a>
              </li>
                         
              @if (Auth::guest())
                  <li class="nav-item">
                        <a class="nav-link loginbutton" href="{{route('login')}}">Đăng nhập</a>
                  </li>
              @else
                @if (Auth::user()->level == 1)
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.home')}}" >Quản lý thông tin</a>
                  </li> 
                @endif   
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold; font-style: italic;">
                      Xin chào {{Auth::user()->username}} !
                    </a>
                    <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{route('password.change')}}">Đổi mật khẩu</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Đăng xuất
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
              @endif
            </ul>
            
          </div>
        </nav>

        @yield('banner')
  </div>

  @yield('content')
    
    
  <script type="text/javascript" src="{{URL::asset('js/jquery-3.3.1.slim.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/popper.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/welcome.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/jquery-3.4.1.min.js')}}"></script>
</body>
</html>
