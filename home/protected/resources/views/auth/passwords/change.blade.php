<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>
  <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('css/all.css')}}">
</head>
<body>
  
  
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
          <a class="nav-link" href="#">Trang chủ<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Quản lý thông tin</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold; font-style: italic;">
            Xin chào {{Auth::user()->username}} !
          </a>
          <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
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
      </ul>
    </div>
  </nav>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form id="staffinfor" action="{{route('password.change')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-12">
              <fieldset class="form-group avatar-group">
                <div class="row">

                  <div class="col-4 text-right">
                    <img src="{{URL::asset('images/hungpn.jpg')}}" alt="" class="img-fuild avatar">
                  </div>
                  <div class="col-8">
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                    <label for="exampleInputEmail1">Mật khẩu cũ</label>
                  </div>
                  <div class="col-7">
                    <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Nhập mật khẩu cũ">
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                  <label for="exampleSelect1">Mật khẩu mới</label>
                </div>
                <div class="col-7">
                  <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Nhập mật khẩu mới">
                </div>              
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                  <label for="exampleSelect1">Nhập lại mật khẩu mới</label>
                </div>
                <div class="col-7">
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Nhập lại mật khẩu mới">
                </div>              
              </fieldset>
              <fieldset>
                <div class="line">
                  <div class="container">
                    <div class="row">
                      <div class="col-4"></div>
                      <div class="col-4" style="height: 2px; background: #3498db; margin-top: 20px; margin-bottom: 30px;"></
                      <div class="col-4"></div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
              </div>            
            </div>
            </div>            
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/staff.js"></script>
</body>
</html>