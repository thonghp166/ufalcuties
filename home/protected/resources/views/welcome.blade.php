@extends('layouts.app')
@section('banner')
<div class="banner">
  <img src="{{URL::asset('images/webv1.jpg')}}" alt="" class="img-fluid banner-image">
  <div class="blacklayer"></div>
  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8 detail">
        <div class="box">
          <p class="title">u-faculties</p>
          <p class="lineleft"></p>
          <p class="lineright"></p>
          <p class="clonetitle">Hệ thống tìm kiếm cán bộ theo danh mục: đơn vị, lĩnh vực nghiên cứu</p>
          <p class="go">Khám phá nào</p>
        </div>
      </div>
      <div class="col-2"></div>
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
              <p class="departmentname">Đơn vị: {{$element->name}}</p>
              <p class="departmenttype">Loại đơn vị: {{$element->type}}</p>
              <p class="departmentaddress">Địa chỉ: {{$element->address}}</p>
              <p class="departmentphone">Số điện thoại: {{$element->phone}}</p>
              <p class="departmentwebsite">Website: {{$element->website}}</p>
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
          <a href="{{route('search')}}" class="findstaff">Xem thêm</a>
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
    <div class="row" id="welcome">
      <script>
          var idArr = [];
          var nameArr = [];
          var parentArr = [];
          var allId = [];
          var allParent = [];
      </script>
      <?php foreach ($field as $element): ?>
          <script>
              var allParentLength = allParent.push(<?php echo $element->childOf ?>);
              var allIdLength = allId.push(<?php echo $element->id ?>);
          </script>
          <?php if ($element->childOf == 0): ?>
              <div class="col-12 field field{{$element->id}}" data-id="{{$element->id}}" data-parent="{{$element->childOf}}">
                  <i class="dropdownicon fas fa-caret-right"></i> 
                  <a href="" class="fieldelement"> {{$element->name}}</a>
              </div>
          <?php else: ?>
                  <script>
                      var idLength = idArr.push(<?php echo $element->id ?>);
                      var nameLength = nameArr.push("<?php echo $element->name ?>");
                      var parentLength = parentArr.push(<?php echo $element->childOf ?>);
                  </script>                         
          <?php endif ?>
      <?php endforeach ?>
    </div>
    <div class="row">
      <div class="col-4">
        <div class="line"></div>
      </div>
      <div class="col-4">
        <div class="text-center">
          <a href="{{route('search')}}" class="findstaff">Xem thêm</a>
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
              <p class="unique">{{$element->degree}} {{$element->name}}</p>
              <p class="code">Mã cán bộ: {{$element->code}}</p>
              <p class="staff_type">Chức vụ: {{$element->staff_type}}</p>
              <p class="work_unit">Bộ môn: {{$element->work_unit}}</p>
              <p class="phone">Số điện thoại: {{$element->phone}}</p>
              <p class="email">VNU Email: {{$element->vnu_email}}</p>
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
          <a href="{{route('search')}}" class="findstaff">Xem thêm</a>
        </div>
      </div>
      <div class="col-4">
        <div class="line"></div>
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


<script type="text/javascript" src="{{URL::asset('js/welcome_tree.js')}}"></script>
@endsection