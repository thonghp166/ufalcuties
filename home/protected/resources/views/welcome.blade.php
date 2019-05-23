@extends('layouts.app')
@section('banner')
<div class="banner">
  <img src="{{URL::asset('images/webv1.jpg')}}" alt="" class="img-fluid banner-image">
  <div class="blacklayer"></div>
  <div class="container">
    <div class="row">
      <div class="col-3"></div>
      <div class="col-6 detail">
        <div class="box">
          <p class="title">u-faculties</p>
          <p class="lineleft"></p>
          <p class="lineright"></p>
          <p class="content">Tiện tích, đầy đủ, hiệu quả.</p>
          <p class="go">Khám phá nào</p>
        </div>
      </div>
      <div class="col-3"></div>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="workunit">
  <div class="container">
    <div class="row">
      <div class="col-6 title">
        <h2><i class="fas fa-building"></i> BỘ MÔN, PHÒNG THÍ NGHIỆM</h2>
      </div>
      <div class="col-6"></div>
    </div>
    <div class="row">
      <?php foreach ($department as $element): ?>
        <div class="col-4">
          <div class="text-left item">
            <div class="avatar">
              <img src="{{URL::asset('images/DTVT.png')}}" alt="" class="img-fuild">
            </div>
            <div class="transperantlayer"></div>
            <div class="content">
              <h3>Đơn vị: {{$element->name}}</h3>
              <h4>Loại đơn vị  : {{$element->type}}</h4>
              <h4>Địa chỉ      : {{$element->address}}</h4>
              <h4>Số điện thoại: {{$element->phone}}</h4>
              <h4>Website      : {{$element->website}}</h4>
            </div>
            <div class="more">
              <a href="">Chi tiết</a>
            </div>            
          </div>
        </div>
      <?php endforeach ?>
    </div>

    <div class="row">
      <div class="col-4">
        <div class="line"></div>
      </div>
      <div class="col-4">
        <div class="text-center">
          <a href="" class="findstaff">Xem thêm</a>
        </div>
      </div>
      <div class="col-4">
        <div class="line"></div>
      </div>
    </div>
  </div>
</div>

<div class="research">
  <div class="container">
    <div class="row">
      <div class="col-6 title">
        <h2><i class="fas fa-search"></i> LĨNH VỰC NGHIÊN CỨU</h2>
      </div>
      <div class="col-6"></div>
    </div>
    <div class="row">
      <?php foreach ($field as $element): ?>
        <div class="col-4">
          <div class="text-left item">
            <div class="avatar">
              <img src="{{URL::asset('images/CNTT.jpg')}}" alt="" class="img-fuild">
            </div>
            <div class="transperantlayer"></div>
            <div class="content">
              <h3>{{$element->name}}</h3>
              <h4>{{$element->childOf}}</h4>
            </div>
            <div class="more">
              <a href="">Chi tiết</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="row">
      <div class="col-4">
        <div class="line"></div>
      </div>
      <div class="col-4">
        <div class="text-center">
          <a href="" class="findstaff">Xem thêm</a>
        </div>
      </div>
      <div class="col-4">
        <div class="line"></div>
      </div>
    </div>
  </div>
</div>

<div class="teacher">
  <div class="container">
    <div class="row">
      <div class="col-6 title">
        <h2><i class="fas fa-users"></i> DANH SÁCH CÁN BỘ</h2>
      </div>
      <div class="col-6"></div>
    </div>
    <div class="row">
      <?php foreach ($staff as $element): ?>
        <div class="col-4">
          <div class="text-left item">
            <div class="avatar">
              <img src="{{URL::asset('images/CNTT.jpg')}}" alt="" class="img-fuild">
            </div>
            <div class="transperantlayer"></div>
            <div class="content">
              <h3>{{$element->degree}} {{$element->name}}</h3>
              <h4>{{$element->code}}</h4>
              <h4>{{$element->staff_type}}</h4>
              <h4>{{$element->work_unit}}</h4>
              <h4>{{$element->phone}}</h4>
              <h4>{{$element->vnu_email}}</h4>
              <h4>{{$element->gmail}}</h4>
              <h4>{{$element->website}}</h4>
              <h4>{{$element->address}}</h4>
            </div>
            <div class="more">
              <a href="">Chi tiết</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="row">
      <div class="col-4">
        <div class="line"></div>
      </div>
      <div class="col-4">
        <div class="text-center">
          <a href="" class="findstaff">Xem thêm</a>
        </div>
      </div>
      <div class="col-4">
        <div class="line"></div>
      </div>
    </div>
</div>
@endsection