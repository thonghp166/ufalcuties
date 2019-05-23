<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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
            <a class="dropdown-item" href="#">Đổi mật khẩu</a>
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

  <div class="layer"></div>

  <div class="changeavatar">
    <span class="title">Thay đổi ảnh đại diện</span>
    <p class="upload">Tải ảnh lên</p>
    <p class="delete">Xóa ảnh đại diện</p>
    <p id="cancel">Hủy</p>
  </div>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form id="staffinfor" method="POST" action="../{{$staff->id}}/edit">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-4 tag" style="border-right: 1px solid black;">
              <a href="../{{$staff->id}}/edit" style="font-weight: bold">Thông tin chung</a>
              <a href="../{{$staff->id}}/field">Lĩnh vực nghiên cứu</a>
              <a href="../{{$staff->id}}/topic">Chủ đề quan tâm</a>
            </div>
            <div class="col-8">
              <fieldset class="form-group avatar-group">
                <div class="row">

                  <div class="col-4 text-right">
                    <img src="{{URL::asset('images/thanhld.png')}}" alt="" class="img-fuild avatar">
                  </div>
                  <div class="col-8">
                    <h3>{{$staff->degree}} {{$staff->name}}</h3>

                    <p id="changeavatarbutton" onclick="change()">Thay đổi ảnh đại diện</p>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                    <label for="exampleInputEmail1">Mã cán bộ <i class="fas fa-user"></i></label>
                  </div>
                  <div class="col-7">
                    <input type="text" class="form-control" disabled="" id="code" placeholder="Nhập mã cán bộ" value="{{$staff->code}}">
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                  <label for="exampleSelect1">Chức vụ</label>
                </div>
                <div class="col-7">
                  <input type="text" class="form-control" disabled="" id="staff_type" placeholder="Nhập chức vụ" value="{{$staff->staff_type}}">
                </div>              
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                  <label for="exampleSelect1">Bộ môn</label>
                </div>
                <div class="col-7">
                  <input type="text" class="form-control" disabled="" id="work_unit" placeholder="Nhập bộ môn, phòng thí nghiệm" value="{{$staff->work_unit}}">
                </div>              
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                  <label for="exampleSelect1">Học hàm, học vị</label>
                </div>
                <div class="col-7">
                  <input type="text" class="form-control" disabled="" name="degree" id="degree" placeholder="Nhập học hàm, học vị" value="{{$staff->degree}}">
                </div>              
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                    <label for="phone">Số điện thoại<i class="fas fa-phone"></i></label>
                  </div>
                  <div class="col-7">
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="{{$staff->phone}}">
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                    <label for="exampleInputEmail1">VNU email <i class="fas fa-envelope"></i></label>
                  </div>
                  <div class="col-7">
                    <input type="email" class="form-control" disabled="" name="vnu_email" id="vnu_email" placeholder="Nhập email VNU" value="{{$staff->vnu_email}}">
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                    <label for="exampleInputEmail1">Email khác <i class="far fa-envelope"></i></label>
                  </div>
                  <div class="col-7">
                    <input type="email" class="form-control" id="gmail" name="gmail" placeholder="Nhập email khác" value="{{$staff->gmail}}">
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                    <label for="exampleInputEmail1">Website <i class="fas fa-paper-plane"></i></label>
                  </div>
                  <div class="col-7">
                    <input type="text" class="form-control" id="website" name="website" placeholder="Nhập địa chỉ website" value="{{$staff->website}}">
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                    <label for="exampleInputEmail1">Địa chỉ <i class="fas fa-building"></i></label>
                  </div>
                  <div class="col-7">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ nơi làm việc" value="{{$staff->address}}">
                  </div>
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
                <button type="submit" class="btn btn-primary">Gửi</button>
                @if (session('status'))
                  <div class="alert alert-success" style="display: block; margin-top: 30px; position: fixed; top: 100px; right: 10%; z-index: 4; transition: 0.4s;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                    {{ session('status') }}
                  </div>
                @endif
              </div>            
            </div>
            </div>            
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="{{URL::asset('js/jquery-3.3.1.slim.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/popper.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/staff.js')}}"></script>
</body>
</html>