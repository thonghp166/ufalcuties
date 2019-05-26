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

<script type="text/javascript" src="{{URL::asset('js/search.js')}}"></script>
<script>
	function contentprocess (name) {
		var content = document.querySelector("#category ." + name + " .content");
		content.classList.toggle("showcontent");
	}

</script>

@endsection