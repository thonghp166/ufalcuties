@extends('layouts.app2')

@section('content')

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
        <form id="staffinfor" method="POST" action="{{route('staff.update.info',['id' => Auth::user()->staff->id])}}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-4 tag" style="border-right: 1px solid black;">
            <a href="{{route('staff.edit',['id' => Auth::user()->staff->id])}}" style="font-weight: bold"><i class="fas fa-user"></i> Thông tin chung</a>
            <a href="{{route('staff.edit.field',['id' => Auth::user()->staff->id])}}"><i class="fas fa-search"></i> Lĩnh vực nghiên cứu</a>
            <a href="{{route('staff.edit.topic',['id' => Auth::user()->staff->id])}}"><i class="fas fa-newspaper"></i> Chủ đề quan tâm</a>
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
                <div class="col-1"></div>
                <div class="col-4 text-left">
                  <label for="exampleInputEmail1"><i class="fas fa-user"></i> Mã cán bộ : </label>
                </div>
                <div class="col-7">
                  <input type="text" class="form-control" disabled="" id="code" placeholder="Nhập mã cán bộ" value="{{$staff->code}}">
                </div>
              </div>
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <div class="col-1"></div>
                <div class="col-4 text-left">
                <label for="exampleSelect1"><i class="fas fa-graduation-cap"></i> Chức vụ : </label>
              </div>
              <div class="col-7">
                <input type="text" class="form-control" disabled="" id="staff_type" placeholder="Nhập chức vụ" value="{{$staff->staff_type}}">
              </div>              
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <div class="col-1"></div>
                <div class="col-4 text-left">
                <label for="exampleSelect1"><i class="fas fa-window-restore"></i> Bộ môn : </label>
              </div>
              <div class="col-7">
                <input type="text" class="form-control" disabled="" id="work_unit" placeholder="Nhập bộ môn, phòng thí nghiệm" value="{{$staff->work_unit}}">
              </div>              
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <div class="col-1"></div>
                <div class="col-4 text-left">
                <label for="exampleSelect1"><i class="fas fa-newspaper"></i> Học hàm, học vị : </label>
              </div>
              <div class="col-7">
                <input type="text" class="form-control" disabled="" name="degree" id="degree" placeholder="Nhập học hàm, học vị" value="{{$staff->degree}}">
              </div>              
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <div class="col-1"></div>
                <div class="col-4 text-left">
                  <label for="phone"><i class="fas fa-phone"></i> Số điện thoại : </label>
                </div>
                <div class="col-7">
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="{{$staff->phone}}">
                </div>
              </div>
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <div class="col-1"></div>
                <div class="col-4 text-left">
                  <label for="exampleInputEmail1"><i class="fas fa-envelope"></i> VNU email : </label>
                </div>
                <div class="col-7">
                  <input type="email" class="form-control" disabled="" name="vnu_email" id="vnu_email" placeholder="Nhập email VNU" value="{{$staff->vnu_email}}">
                </div>
              </div>
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <div class="col-1"></div>
                <div class="col-4 text-left">
                  <label for="exampleInputEmail1"><i class="far fa-envelope"></i> Email khác : </label>
                </div>
                <div class="col-7">
                  <input type="email" class="form-control" id="gmail" name="gmail" placeholder="Nhập email khác" value="{{$staff->gmail}}">
                </div>
              </div>
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <div class="col-1"></div>
                <div class="col-4 text-left">
                  <label for="exampleInputEmail1"><i class="fas fa-paper-plane"></i> Website : </label>
                </div>
                <div class="col-7">
                  <input type="text" class="form-control" id="website" name="website" placeholder="Nhập địa chỉ website" value="{{$staff->website}}">
                </div>
              </div>
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <div class="col-1"></div>
                <div class="col-4 text-left">
                  <label for="exampleInputEmail1"><i class="fas fa-building"></i> Địa chỉ : </label>
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
              <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Gửi</button>
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

<script type="text/javascript" src="{{URL::asset('js/staff.js')}}"></script>

@endsection