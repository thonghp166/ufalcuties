@extends('layouts.app')

@section('content')

<div class="content">
    <div class="usertable">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 style="border-left: 5px solid #3498db; padding-left: 10px; margin-bottom: 40px;">Quản lý tài khoản</h3>
                </div>
            </div>
            <div class="row" id="user">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Mã cán bộ</th>
                            <th>Họ và tên</th>
                            <th>Tài khoản</th>
                            <th>VNU Email</th>
                            <th>Loại cán bộ</th>
                            <th>Học vị</th>
                            <th>Đơn vị công tác</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; foreach ($user as $element): ?>
                            <tr>
                                <?php $staff = $element->staff ?>
                                <td><?php echo $count; $count++; ?></td>
                                <td>{{$staff->code}}</td>
                                <td>{{$staff->name}}</td>
                                <td>{{$staff->account}}</td>
                                <td>{{$staff->vnu_email}}</td>
                                <td>{{$staff->type}}</td>
                                <td>{{$staff->degree}}</td>
                                <td>{{$staff->work_unit}}</td>
                                <td>
                                    <button class="btn btn-primary" style="margin: 5px 5px;"><i class="fas fa-edit"></i> Sửa</button>
                                    <button class="btn btn-danger" style="margin: 5px 5px;"><i class="fas fa-trash"></i> Xóa</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <button class="btn btn-success" style="margin-top: 20px;"><i class="fas fa-plus-circle"></i> Thêm mới</button>
                        <button class="btn btn-primary" style="margin-top: 20px;"><i class="fas fa-plus-circle"></i> Thêm từ excel</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6" id="excelimport">
                    <div class="text-center">
                        <form>
                            <fieldset class="form-group">
                                <label for="exampleInputFile">Tải file excel</label>
                                <input type="file" class="form-control-file" id="exampleInputFile">
                            </fieldset>
                            <button class="btn btn-primary" id="doexcel"><i class="fas fa-file-upload"></i> Nhập vào</button>
                        </form>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>

    <div class="departmenttable">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 style="border-left: 5px solid #3498db; padding-left: 10px; margin-bottom: 40px;">Quản lý đơn vị</h3>
                </div>
            </div>

            <div class="row" id="department">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Tên đơn vị</th>
                            <th>Loại đơn vị</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th>Website</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <?php $count = 1; foreach ($department as $element): ?>
                            <tr>
                                <td><?php echo $count; $count++; ?></td>    
                                <td>{{$element->name}}</td> 
                                <td>{{$element->type}}</td> 
                                <td>{{$element->address}}</td>  
                                <td>{{$element->phone}}</td>    
                                <td>{{$element->website}}</td>  
                                <td>
                                    <button class="btn btn-primary" style="margin: 5px 5px;"><i class="fas fa-edit"></i> Sửa</button>
                                    <button class="btn btn-danger" style="margin: 5px 5px;"><i class="fas fa-trash"></i> Xóa</button>
                                </td>
                            </tr>   
                        <?php endforeach ?>                     
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <button class="btn btn-success" style="margin-top: 20px;"><i class="fas fa-plus-circle"></i> Thêm mới</button>
                </div>
            </div>
        </div>
    </div>

    <div class="fieldtable">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 style="border-left: 5px solid #3498db; padding-left: 10px; margin-bottom: 40px;">Quản lý lĩnh vực nghiên cứu</h3>
                </div>
            </div>

            <div class="row" id="field">
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
                                <i class="dropdownicon fas fa-caret-right"></i> {{$element->name}}
                                <i class="fas fa-plus-square"></i>
                                <i class="fas fa-pen-square"></i>
                                <i class="fas fa-minus-square"></i>  
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
        
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <button class="btn btn-success" style="margin-top: 20px;"><i class="fas fa-plus-circle"></i> Thêm mới</button>
                </div>
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

<script type="text/javascript" src="{{URL::asset('js/admin.js')}}"></script>
@endsection