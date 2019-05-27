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
				<div class="col-6 text-center department">
					<p class="title" onclick="contentprocess('department')">
						Đơn vị  <i class="fas fa-caret-down"></i>
					</p>
					<div class="content">
						<?php foreach ($department as $element): ?>
							<a href="" class="departmentelement">{{$element->name}}</a>
						<?php endforeach ?>
					</div>
				</div>
				<div class="col-6 text-center fields">
					<p class="title" onclick="contentprocess('fields')">
						Lĩnh vực nghiên cứu  <i class="fas fa-caret-down"></i>
					</p>
					<div class="content">
						<div class="row">
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
			              <p class="unique">{{$element->degree}} {{$element->name}}</p>
			              <p class="code">Mã cán bộ: {{$element->code}}</p>
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

<script type="text/javascript" src="{{URL::asset('js/search.js')}}"></script>

<script>
	function contentprocess (name) {
		var content = document.querySelector("#category ." + name + " .content");
		content.classList.toggle("showcontent");
	}

</script>

@endsection