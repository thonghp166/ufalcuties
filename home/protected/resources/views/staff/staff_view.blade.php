@extends('layouts.app3')

@section('content')

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-3"></div>
      <div class="col-6">
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
	                  <h3>{{$staff->degree}} {{$staff->name}}</h3>
	                </div>
	              </div>
	            </fieldset>
	            <fieldset class="form-group">
	              <div class="row">
	              	<div class="col-1"></div>
	                <div class="col-5 text-left">
	                  <label for="exampleInputEmail1"><i class="fas fa-user"></i> Mã cán bộ :</label>
	                </div>
	                <div class="col-6 text-left">
	                	<p>{{$staff->code}}</p>
	                </div>
	              </div>
	            </fieldset>
	            <fieldset class="form-group">
	              <div class="row">
	              	<div class="col-1"></div>
	                <div class="col-5 text-left
	                ">
	                <label for="exampleSelect1"><i class="fas fa-graduation-cap"></i> Chức vụ :</label>
	              </div>
	              <div class="col-6 text-left">
	              	<p>{{$staff->staff_type}}</p>
	              </div>
	            </fieldset>
	            <fieldset class="form-group">
	              <div class="row">
	              	<div class="col-1"></div>
	                <div class="col-5 text-left
	                ">
		               <label for="exampleSelect1"><i class="fas fa-window-restore"></i> Bộ môn :</label>
		            </div>
		            <div class="col-6 text-left">
		            	<p>{{$staff->work_unit}}</p>
		            </div>
	              </fieldset>
	            <fieldset class="form-group">
	              <div class="row">
	              	<div class="col-1"></div>
	                <div class="col-5 text-left
	                ">
	                <label for="exampleSelect1"><i class="fas fa-newspaper"></i> Học hàm, học vị :</label>
	              </div>
	              <div class="col-6 text-left">
	              	<p>{{$staff->degree}}</p>
	              </div>
	            </fieldset>
	            <fieldset class="form-group">
	              <div class="row">
	              	<div class="col-1"></div>
	                <div class="col-5 text-left
	                ">
	                  <label for="phone"><i class="fas fa-phone"></i> Số điện thoại :</label>
	                </div>
	                <div class="col-6 text-left">
	                	<p>{{$staff->phone}}</p>
	                </div>
	              </div>
	            </fieldset>
	            <fieldset class="form-group">
	              <div class="row">
	              	<div class="col-1"></div>
	                <div class="col-5 text-left
	                ">
	                  <label for="exampleInputEmail1"><i class="fas fa-envelope"></i> VNU email :</label>
	                </div>
	                <div class="col-6 text-left">
	                	<p>{{$staff->vnu_email}}</p>
	                </div>
	              </div>
	            </fieldset>
	            <fieldset class="form-group">
	              <div class="row">
	              	<div class="col-1"></div>
	                <div class="col-5 text-left
	                ">
	                  <label for="exampleInputEmail1"><i class="far fa-envelope"></i> Email khác :</label>
	                </div>
	                <div class="col-6 text-left">
	                	<p>{{$staff->gmail}}</p>
	                </div>
	              </div>
	            </fieldset>
	            <fieldset class="form-group">
	              <div class="row">
	              	<div class="col-1"></div>
	                <div class="col-5 text-left
	                ">
	                  <label for="exampleInputEmail1"><i class="fas fa-paper-plane"></i> Website :</label>
	                </div>
	                <div class="col-6 text-left">
	                	<p>{{$staff->website}}</p>
	                </div>
	              </div>
	            </fieldset>
	            <fieldset class="form-group">
	              <div class="row">
	              	<div class="col-1"></div>
	                <div class="col-5 text-left
	                ">
	                  <label for="exampleInputEmail1"><i class="fas fa-building"></i> Địa chỉ :</label>
	                </div>
	                <div class="col-6 text-left">
	                	<p>{{$staff->address}}</p>
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
	            <fieldset class="form-group">
	              <div class="row">
	              	<div class="col-1"></div>
	                <div class="col-11 text-left">
	                	<label for="exampleSelect1"><i class="fas fa-newspaper"></i> Chủ đề quan tâm :</label>
	              	</div>
	              </div>
	              <?php foreach ($topic as $element): ?>
	              	<div class="row">
	              		<div class="col-1"></div>
	              		<div class="col-11 text-left">
	              			<p><i class="fas fa-check-circle" style="color: #27ae60;"></i> {{$element->name}}</p>
	              		</div>
	              	</div>
	              <?php endforeach ?>
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
	              	<div class="col-1"></div>
	                <div class="col-11 text-left">
	                	<label for="exampleSelect1"><i class="fas fa-search"></i> Lĩnh vực nghiên cứu :</label>
	              	</div>
	              </div>
	              <?php foreach ($field as $element): ?>
	              	<div class="row">
	              		<div class="col-1"></div>
	              		<div class="col-11 text-left">
	              			<p><i class="fas fa-check-circle" style="color: #27ae60;"></i> {{$element->name}}</p>
	              		</div>
	              	</div>
	              <?php endforeach ?>
	            </fieldset>
          	</div>
          </div>            
        </form>
      </div>
      <div class="col-3"></div>
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