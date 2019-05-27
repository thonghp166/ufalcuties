@extends('layouts.app3')

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
	                  <img src="{{URL::asset('images/hungpn.jpg')}}" alt="" class="img-fuild avatar">
	                </div>
	                <div class="col-8">
	                  <h3>{{Auth::user()->staff->degree}} {{Auth::user()->staff->name}}</h3>
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