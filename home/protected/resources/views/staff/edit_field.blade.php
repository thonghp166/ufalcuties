@extends('layouts.app2')

@section('content')
<div class="content">
	<div class="container">
	  <div class="row">
	    <div class="col-12">
	      <form id="staffinfor" method="POST" action="{{route('staff.update.field',['id' => Auth::user()->staff->id])}}">
	        {{ csrf_field() }}
	        <div class="row">
	            <div class="col-4 tag" style="border-right: 1px solid black;">
	            <a href="{{route('staff.edit',['id' => Auth::user()->staff->id])}}"><i class="fas fa-user"></i> Thông tin chung</a>
	            <a href="{{route('staff.edit.field',['id' => Auth::user()->staff->id])}}" style="font-weight: bold"><i class="fas fa-search"></i> Lĩnh vực nghiên cứu</a>
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
				  </div>
	            </div>
	          </fieldset>
	          </fieldset>
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
	              <div class="col-12 ml-5 mr-5">
	              	<script>
	              		var idArr = [];
	              		var nameArr = [];
	              		var childArr = [];
	              		var allId = [];
	              		var allParent = [];
	              		var staff_fieldArr = [];
	              	</script>

	              	<?php foreach ($fields as $element): ?>
	              		<script>
	              			var allParentLength = allParent.push(<?php echo $element->childOf ?>);
	              			var allIdLength = allId.push(<?php echo $element->id ?>);
	              		</script>
	              		<?php if ($element->childOf != 0): ?>
	                  		<script>
	                  			var idLength = idArr.push(<?php echo $element->id ?>);
	                  			var nameLength = nameArr.push("<?php echo $element->name ?>");
	                  			var childLength = childArr.push(<?php echo $element->childOf ?>);
	                  		</script>
	                  	<?php else: ?>
	                  		<div class="rootparent box box{{$element->id}}" data-parent="0" data-id="{{$element->id}}">
	                  			<i class="dropdownicon fas fa-caret-down"></i>
	                  			<input type="checkbox" class="checkbox" id="_{{$element->id}}" name="ids[]" value="{{$element->id}}"> {{$element->name}}
	                  		</div>
						<?php endif ?>
	              	<?php endforeach ?>
	              
					<?php foreach ($staff->fields as $element): ?>
	              		<script>
	              			var staff_fieldLength = staff_fieldArr.push(<?php echo $element->id ?>);
	              		</script>
	              	<?php endforeach ?>
	              	
	              	
	              </div>
	            </div>
	          </fieldset>
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
	            <button type="submit" class="btn btn-primary"><i class="fas fa-pen-square"></i> Cập nhật</button>
	            @if (session('status'))
                <div class="alert alert-success" style="display: block; margin-top: 30px;transition: 0.4s;">
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

<script type="text/javascript" src="{{URL::asset('js/field.js')}}"></script>

@endsection
