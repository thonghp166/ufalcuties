@extends('layouts.app')

@section('content')

<div class="content">
	
	<div class="searchbar">
		<div class="container">
			<div class="row" id="search">
				<div class="col-3" id="left"></div>
				<div class="col-6" id="center">					
					<div class="text-center">
						<input type="text" class="key" id="key" onkeyup="search(this)" style="width: 100%;" placeholder="Nhập nội dung tìm kiếm">		
					</div>
					<div class="keyremove">
						<i class="fas fa-window-close" style="font-size: 20px; color: gray; cursor: pointer;" onclick="clearkey(this)"></i>
					</div>
					<div class="text-center keyresult"></div>
				</div>
				<div class="col-3" id="right">
					<div class="float-left">
						<button id="searchbutton" class="btn btn-primary"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</div>
			<div class="row" id="category">
				<div class="col-6 department">
					<div class="row">
						<div class="col-12">
							<div class="text-center">
								<p class="departmenttitle">Đơn vị :</p>					
								<select id="departmentselect" class="custom-select">
								  <?php foreach ($department as $element): ?>
								  	<option value="{{$element->id}}">{{$element->name}}</option>
								  <?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 fields">
					<div class="row">
						<div class="col-12">
							<div class="text-center">
								<p class="fieldtitle">Lĩnh vực nghiên cứu :</p>					
								<select id="fieldselect" class="custom-select">
								  <?php foreach ($field as $element): ?>
								  	<option value="{{$element->id}}">{{$element->name}}</option>
								  <?php endforeach ?>
								</select>
							</div>
						</div>
					</div>			
				</div>
			</div>
		</div>
	</div>

	<div class="result">
		<div class="container">
			<div id="resulttitle">
				<h4>Tổng số cán bộ : <?php echo count($staff); ?></h4>
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
			            	<a href="{{route('staff.info',['account' => $element->account])}}">Chi tiết</a>
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

@routes
<script type="text/javascript" src="{{URL::asset('js/search.js')}}"></script>
<script>
	function contentprocess(name) {
		var content = document.querySelector("#category ." + name + " .content");
		content.classList.toggle("showcontent");
	}
</script>
<script>
	
	String.prototype.replaceAll = function(search, replacement) {
	  		var target = this;
	  		return target.split(search).join(replacement);
	};
	function searchField(variable){
		var id = variable.getAttribute("data-id");
	    var named = variable.getAttribute("data-name");
	    var newrequest = new XMLHttpRequest();

	    newrequest.onreadystatechange = function(){
	    	if (this.readyState == 4 && this.status == 200) {
        		var data = $.parseJSON(this.response);
        			var keyresult = document.querySelector(".keyresult");
        			keyresult.innerHTML = "";
        			for (var i = 0; i < data.results.length; i++) {
        				console.log(data.results[i]);
        			}
        			//cac du lieu tim kiem duoc luu trong data.results
        		console.log(this.responseText);
        	} else {
        		console.log('error');
        	}
        	String.prototype.replaceAll = function(search, replacement) {
	  			var target = this;
	  			return target.split(search).join(replacement);
			};
	    }
	    newrequest.open("GET", route('staff.search.field') + "?id=" + id + "&name=" + named.replaceAll(' ', '+'), true);
		newrequest.send();
	}



	function searchDepartment(variable){
		var id = variable.getAttribute('data-id');
		var named = variable.getAttribute("data-name");
		var newrequest = new XMLHttpRequest();

	    newrequest.onreadystatechange = function(){
	    	if (this.readyState == 4 && this.status == 200) {
        		var data = $.parseJSON(this.response);
        		//xu ly sau khi tim kiem thanh cong
        		//cac du lieu tim kiem duoc luu trong data.results
        		console.log(this.responseText);
        	} else {
        		console.log('error');
        	}
	    }
	    String.prototype.replaceAll = function(search, replacement) {
	  		var target = this;
	  		return target.split(search).join(replacement);
		};
	    newrequest.open("GET", route('staff.search.department') + "?id=" + id + "&name=" + named.replaceAll(' ', '+'), true);
		newrequest.send();
	}

	function search(variable){
		var attrid = document.getElementById('searchattr').value;
		var text = variable.value.trim();
		if (text.length > 0){
			var newrequest = new XMLHttpRequest();
			newrequest.onreadystatechange = function(){
		    	if (this.readyState == 4 && this.status == 200) {
	        		var data = $.parseJSON(this.response);
	        		var keyresult = document.querySelector(".keyresult");
		        	keyresult.innerHTML = "";
	        		if (data.results.length > 0) {
	        			var keyremove = document.querySelector(".keyremove i");
		        		keyremove.classList.add("show");
		        		keyresult.classList.add("showlayer");
		        		for (var i = 0; i < data.results.length; i++) {
	        				var row = document.createElement("row");	        				
	        				var rowcontent = document.createElement("div");
	        				rowcontent.setAttribute("class", "col-12 text-left keyresultrow");
	        				rowcontent.setAttribute("style", "padding: 5px 5px; margin: 5px 0px; cursor: pointer;");
	        				rowcontent.setAttribute("data-id", data.results[i].id);
	        				rowcontent.setAttribute("data-name", data.results[i].name);
	        				rowcontent.setAttribute("onclick", "");
	        				if (attrid == 3) {
	        					rowcontent.innerHTML = data.results[i].name + " - " + data.results[i].code;
	    					} else {
	    						rowcontent.innerHTML = data.results[i].name;
	    					}	        				
	        				row.appendChild(rowcontent);
	        				keyresult.appendChild(row);
	           			}
	        		}
	        		console.log(this.responseText);
	        	} else {
	        		console.log('error');
	        	}
		    }
		    newrequest.open("GET", route('staff.search.text') + "?id=" + attrid + "&text=" + variable.value, true);
			newrequest.send();
		} else {
			var keyresult = document.querySelector(".keyresult");
			keyresult.classList.remove("showlayer");
			keyresult.innerHTML = "";
			var keyremove = document.querySelector(".keyremove i");
			keyremove.classList.remove("show");
		}
	}

	function clearkey (variable) {
		var key = document.getElementById("key");
		var keyresult = document.querySelector(".keyresult");
		keyresult.classList.remove("showlayer");
		keyresult.innerHTML = "";
		key.value = ""; 
		variable.classList.remove("show");
	}
</script>
@endsection