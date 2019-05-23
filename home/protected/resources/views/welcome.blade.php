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
  </div>
</div>
@endsection