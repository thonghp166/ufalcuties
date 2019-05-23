@extends('layouts.app')
@section('content')
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
