@extends('layouts.app2')

@section('content')

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form id="staffinfor" method="POST" action="{{route('staff.update.topic')}}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-4 tag" style="border-right: 1px solid black;">
            <a href="{{route('staff.edit')}}"><i class="fas fa-user"></i> Thông tin chung</a>
            <a href="{{route('staff.edit.field')}}"><i class="fas fa-search"></i> Lĩnh vực nghiên cứu</a>
            <a href="{{route('staff.edit.topic')}}" style="font-weight: bold"><i class="fas fa-newspaper"></i> Chủ đề quan tâm</a>
          </div>
          <div class="col-8">
            <fieldset class="form-group avatar-group">
              <div class="row">

                <div class="col-4 text-right">
                  <img src="http://ufaculties.vn/{{$staff->img_url}}" alt="" class="img-fuild avatar">
                </div>
                <div class="col-8">
                  <script> 
                    var staff_id = <?php echo $staff->id ?>; 
                    var count = 1;
                  </script>
                  <h3>{{$staff->degree}} {{$staff->name}}</h3>
                </div>
              </div>
            </fieldset>
            <fieldset>
              <div class="tabletitle" style="width: 100%; text-align: center;">
                <p style="width: 15%; float: left;">Số thứ tự</p>                
                <p style="width: 20%; float: left;">Chủ đề quan tâm</p>                
                <p style="width: 35%; float: left;">Mô tả chủ đề quan tâm</p>                
                <p style="width: 30%; float: left;">Thao tác</p>                
              </div>
            </fieldset>
            <fieldset id="topic">
              <table class="table text-center">
                <tbody id="topicbody">
                  <?php $count = 1; foreach ($staff->topics as $element): ?>
                    <tr style="width: 100%;">
                      <td style="width: 15%;"><?php echo $count; $count++;?><script> count = <?php echo $count; ?></script></td>
                      <td style="width: 20%;">
                        <textarea disabled="" style="width: 100%; height: 100px; padding: 5px 5px;">{{$element->name}}</textarea>
                      </td>
                      <td style="width: 35%;">
                        <textarea disabled="" style="width: 100%; height: 100px; padding: 5px 5px;">{{$element->detail}}</textarea>
                      </td>
                      <td style="width: 30%;">
                        <span class="btn btn-primary edit" data-id="{{$element->id}}" data-name="{{$element->name}}" data-detail="{{$element->detail}}" style="color: white!important; font-weight: normal; font-style: italic; cursor: pointer; margin: 5px 5px;" onclick="edit(this)"><i class="fas fa-pen-square"></i> Sửa</span>
                        <span class="btn btn-danger delete" data-id="{{$element->id}}" data-name="{{$element->name}}" data-detail="{{$element->detail}}" style="color: white!important; font-weight: normal; font-style: italic; cursor: pointer; margin: 5px 5px;" onclick="remove(this)"><i class="fas fa-trash"></i> Xóa</span>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
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
                <div class="col-4 text-right">
                </div>
                <div class="col-7">
                  <input type="text" class="form-control" id="topic_id" name="topic_id" hidden="">
                </div>
              </div>
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <div class="col-4 text-right">
                  <label for="name">Chủ đề quan tâm mới</label>
                </div>
                <div class="col-7">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tiêu đề chủ đề quan tâm mới">
                </div>
              </div>
            </fieldset>
            <fieldset class="form-group">
              <div class="row">
                <div class="col-4 text-right">
                <label for="detail">Mô tả chủ đề</label>
              </div>
              <div class="col-7">
                <textarea name="detail" id="detail" cols="" rows="" style="width: 100%;height: 100px; padding: 5px 10px;"></textarea>
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
            <div class="text-center">
              <p class="btn btn-primary newtopic" style="cursor: pointer;"><i class="fas fa-plus-circle"></i> Thêm mới</p>
              <p class="btn btn-success updatetopic" style="cursor: pointer;"><i class="fas fa-edit"></i> Cập nhật</p>
            </div>  
            <div class="status text-center"></div>          
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
@routes
<script type="text/javascript" src="{{URL::asset('js/topic.js')}}"></script>
<script>
  function hide(variable) {
    variable.parentNode.parentNode.style.display = "none";
  }

  var topic = document.getElementById("name"),
  description = document.getElementById("detail"),
  topic_id = document.getElementById("topic_id");

  function edit (variable) {
    var newtopic = document.querySelector(".newtopic");
    newtopic.classList.add("hide");

    var updatetopic = document.querySelector(".updatetopic");
    updatetopic.classList.add("showbutton");
    topic_id.value = variable.getAttribute("data-id");
    topic.value = variable.getAttribute("data-name");
    description.value = variable.getAttribute("data-detail");
  }

  function remove (variable) {
    var id = variable.getAttribute("data-id");
    var name = variable.getAttribute("data-name");
    var detail = variable.getAttribute("data-detail");
    var newrequest = new XMLHttpRequest();
    newrequest.onreadystatechange = function () {
      var status = document.querySelector(".status");
      if (this.readyState == 4 && this.status == 200) {
        var data = $.parseJSON(this.response);      
        if (data.state == "Success") {
          variable.parentNode.parentNode.style.display = 'none';
          var row = document.querySelectorAll("#topicbody tr");
          index = 0;
          for (var i = 0; i < row.length; i++) {
            if (row[i].style.display != 'none') {
              index++;
              row[i].cells[0].innerText = index;
            }
          }
          status.style.display = "block";
          status.innerHTML = "<div>" + "Xóa chủ đề '" + name + "' thành công    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
          status.style.background = "#27ae60";
        } else {
          status.style.display = "block";
          status.innerHTML = "<div>" + "Lỗi! Chủ đề quan tâm '" + data.error + "' xóa thất bại    <i class='fas fa-window-close' onclick='hide(this)'></i></div>";
          status.style.background = "#c0392b";
        }
      } else {
        console.log('error');
      }
    }
    newrequest.open("GET", route('staff.delete.topic') + "?id=" + id + "&name=" + name + "&detail=" + detail , true);
    newrequest.send();
  }

</script>

@endsection