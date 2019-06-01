@extends('layouts.app1')

@section('content')

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
                  <img src="http://ufaculties.vn/{{Auth::user()->staff->img_url}}" alt="" class="img-fuild avatar">
                </div>
                <div class="col-8">
                  <h3>{{Auth::user()->staff->degree}} {{Auth::user()->staff->name}}</h3>
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
              <button type="submit" class="btn btn-primary"><i class="fas fa-key"></i> Đổi mật khẩu</button>
              @if (session('status'))
                <div class="alert alert-success" style="display: block; margin-top: 30px;transition: 0.4s;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                  {{ session('status') }}
                </div>
              @elseif (session('error'))
                <div class="alert alert-danger" style="display: block; margin-top: 30px;transition: 0.4s;">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                  {{ session('error') }}
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


<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="float-left">
                    Copyright © 2019 Sharon Team. All rights reserved.        
                </div>
            </div>
            <div class="col-6">
                <div class="float-right">
                    <img src="{{URL::asset('images/vietnam.png')}}" alt="" class="img-fluid flag">
                    <p class="vietnam">Việt Nam</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="top">
  <i class="fas fa-arrow-circle-up"></i>
</div>
@endsection