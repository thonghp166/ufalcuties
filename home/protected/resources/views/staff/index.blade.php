@extends('layouts.app')

@section('content')

<div class="content">
	
	<div class="searchbar">
		<div class="container">
			<div class="row" id="search">
				<div class="col-2" id="left">
					<div class="float-right">
						<select class="custom-select">
						  <option selected>Tất cả</option>
						  <option value="1">Lĩnh vực nghiên cứu</option>
						  <option value="2">Đơn vị</option>
						  <option value="3">Cán bộ</option>
						</select>
					</div>
				</div>
				<div class="col-8" id="center">					
					<div class="text-center">
						<input type="text" class="key" style="width: 100%;" placeholder="Nhập nội dung tìm kiếm">		
					</div>
				</div>
				<div class="col-2" id="right">
					<div class="float-left">
						<button class="btn btn-primary"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</div>
			<div class="row" id="category">
				<div class="col-6 text-center">
					<p class="title">
						Đơn vị  <i class="fas fa-caret-down"></i>
					</p>
					<div class="content">
						<?php foreach ($department as $element): ?>
							<a href="" class="departmentelement">{{$element->name}}</a>
						<?php endforeach ?>
					</div>
				</div>
				<div class="col-6 text-center">
					<p class="title">
						Lĩnh vực nghiên cứu  <i class="fas fa-caret-down"></i>
					</p>
					<div class="content">
						<!-- <?php foreach ($field as $element): ?>
							<a href="">{{$element}}</a>
						<?php endforeach ?> -->
					</div>					
				</div>
			</div>
		</div>
	</div>

	<div class="result">
		<div class="container">
			<div id="resulttitle">
				<h4>Tất cả cán bộ</h4>
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
			              <p>Chi tiết</p>
			            </div>
			          </div>
			        </div>
			      <?php endforeach ?>
			</div>
		</div>
	</div>

</div>

@endsection