@extends('layouts.app2')

@section('content')

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form id="staffinfor" method="POST" action="{{route('staff.update.topic',['id' => Auth::user()->staff->id])}}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-4 tag" style="border-right: 1px solid black;">
            <a href="{{route('staff.edit',['id' => Auth::user()->staff->id])}}">Thông tin chung</a>
            <a href="{{route('staff.edit.field',['id' => Auth::user()->staff->id])}}">Lĩnh vực nghiên cứu</a>
            <a href="{{route('staff.edit.topic',['id' => Auth::user()->staff->id])}}" style="font-weight: bold">Chủ đề quan tâm</a>
          </div>
          <div class="col-8">
            <fieldset class="form-group avatar-group">
              <div class="row">

                <div class="col-4 text-right">
                  <img src="{{URL::asset('images/thanhld.png')}}" alt="" class="img-fuild avatar">
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
            <fieldset id="topic">
              <table class="table text-center" id="topictable">
                <thead>
                  <tr>
                    <th>Số thứ tự</th>
                    <th>Chủ đề quan tâm</th>
                    <th>Mô tả chủ đề quan tâm</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody id="topicbody">
                  <?php $count = 1; foreach ($staff->topics as $element): ?>
                    <tr>
                      <td><?php echo $count; $count++;?><script> count = <?php echo $count; ?></script></td>
                      <td>{{$element->name}}</td>
                      <td>{{$element->detail}}</td>
                      <td>
                        <span class="btn btn-primary edit" data-name="{{$element->name}}" data-detail="{{$element->detail}}" style="color: white!important; font-weight: normal; font-style: italic;"><i class="fas fa-edit"></i> Sửa</span>
                        <span class="btn btn-danger delete" data-name="{{$element->name}}" data-detail="{{$element->detail}}" style="color: white!important; font-weight: normal; font-style: italic;"><i class="fas fa-trash"></i> Xóa</span>
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
              <p id="newtopic" class="btn btn-primary"><i class="fas fa-plus-square"></i> Thêm mới</p>
              <p id="edittopic" class="btn btn-success"><i class="fas fa-pen-square"></i> Cập nhật</p>
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
@routes
<script type="text/javascript" src="{{URL::asset('js/topic.js')}}"></script>
@endsection