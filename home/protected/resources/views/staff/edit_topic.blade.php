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
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Giáo viên
          </a>
          <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Chỉnh sửa thông tin cá nhân</a>
            <a class="dropdown-item" href="#">Đổi mật khẩu</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Đăng xuất</a>
          </div>
        </li>
      </ul>
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm giảng viên" aria-label="Search">
        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" id="barbutton">Tìm kiếm</button>
      </form>
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
          <form id="staffinfor">
            <div class="row">
              <div class="col-4 tag" style="border-right: 1px solid black;">
              <a href="../{{$staff->id}}/edit">Thông tin chung</a>
              <a href="../{{$staff->id}}/field">Lĩnh vực nghiên cứu</a>
              <a href="../{{$staff->id}}/topic" style="font-weight: bold">Chủ đề quan tâm</a>
            </div>
            <div class="col-8">
              <fieldset class="form-group avatar-group">
                <div class="row">

                  <div class="col-4 text-right">
                    <img src="{{URL::asset('images/thanhld.png')}}" alt="" class="img-fuild avatar">
                  </div>
                  <div class="col-8">
                    <h3>{{$staff->degree}} {{$staff->name}}</h3>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Số thứ tự</th>
                      <th>Chủ đề quan tâm</th>
                      <th>Mô tả chủ đề quan tâm</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>An toàn thông tin</td>
                      <td>Cách bảo mật dữ liệu</td>
                      <td>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                        <button type="submit" class="btn btn-danger">Xóa</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                    <label for="exampleInputEmail1">Chủ đề quan tâm mới</label>
                  </div>
                  <div class="col-7">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tiêu đề chủ đề quan tâm mới">
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group">
                <div class="row">
                  <div class="col-4 text-right">
                  <label for="exampleSelect1">Mô tả chủ đề</label>
                </div>
                <div class="col-7">
                  <textarea name="" id="" cols="53" rows="5"></textarea>
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
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button type="submit" class="btn btn-success">Cập nhật</button>
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