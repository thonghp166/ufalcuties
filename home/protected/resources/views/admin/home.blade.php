@extends('layouts.app')

@section('content')

<div class="homelayer">
    
</div>

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
                        <button class="btn btn-success" id="normalimportbutton" style="margin-top: 20px;"><i class="fas fa-plus-circle"></i> Thêm mới</button>
                        <button class="btn btn-primary" id="excelimportbutton" style="margin-top: 20px;"><i class="fas fa-plus-circle"></i> Thêm từ excel</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 excelimport">
                    <div class="text-center">
                        <form id="excelform" enctype="multipart/form-data">
                          {{csrf_field()}}
                          <fieldset class="form-group">
                              <label for="excelfile">Tải file excel</label>
                              <input type="file" class="form-control-file" name="excelfile" id="excelfile">
                          </fieldset>
                          <fieldset>
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-file-upload"></i> Nhập vào</button>
                            <button class="btn btn-secondary" id="cancelexcelbutton"> <i class="fas fa-window-close"></i> Hủy</button>
                          </fieldset>                           
                        </form>
                        <br />
                        <span id="uploaded_file"></span>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 normalimport">
                    <div class="text-center">
                        <form id="newuserform">
                          {{csrf_field()}}
                            <fieldset class="form-group">
                              <label class="title">Nhập thông tin cán bộ mới</label>  
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                  <label for="code"><i class="fas fa-id-card"></i> Mã cán bộ : </label>
                                </div>
                                <div class="col-7">
                                  <input type="text" class="form-control" name="code" id="code" placeholder="Nhập mã cán bộ">
                                </div>
                              </div>
                            </fieldset>
                            <fieldset class="form-group">
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                <label for="name"><i class="fas fa-signature"></i> Họ và tên : </label>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập họ và tên">
                              </div>              
                            </fieldset>
                            <fieldset class="form-group">
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                <label for="account"><i class="fas fa-user"></i> Tài khoản : </label>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control" name="account" id="account" placeholder="Nhập tài khoản">
                              </div>              
                            </fieldset>
                            <fieldset class="form-group">
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                <label for="vnu_email"><i class="fas fa-envelope"></i> VNU Email : </label>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Nhập email VNU">
                              </div>              
                            </fieldset>
                            <fieldset class="form-group">
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                  <label for="staff_type"><i class="fas fa-user-secret"></i> Loại cán bộ : </label>
                                </div>
                                <div class="col-7">
                                  <select name="staff_type" class="form-control" id="staff_type">
                                      <option value="Giảng viên">Giảng viên</option>
                                      <option value="Cán bộ">Cán bộ</option>
                                      <option value="Cán bộ">Cán bộ</option>
                                  </select>
                                </div>
                              </div>
                            </fieldset>
                            <fieldset class="form-group">
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                  <label for="degree"><i class="fas fa-newspaper"></i> Học hàm, học vị : </label>
                                </div>
                                <div class="col-7">
                                  <select name="degree" class="form-control" id="degree">
                                      <option value="CN">CN</option>
                                      <option value="ThS">ThS</option>
                                      <option value="TS">TS</option>
                                      <option value="PGS.TS">PGS.TS</option>
                                      <option value="GS">GS</option>
                                  </select>
                                </div>
                              </div>
                            </fieldset>
                            <fieldset class="form-group">
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                  <label for="work_unit"><i class="far fa-window-restore"></i> Đơn vị công tác : </label>
                                </div>
                                <div class="col-7">
                                  <select name="work_unit" class="form-control" id="work_unit">
                                      <?php foreach ($department as $element): ?>
                                          <option value="{{$element->name}}">{{$element->name}}</option>
                                      <?php endforeach ?>
                                  </select>
                                </div>
                              </div>
                            </fieldset>
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary"> <i class="fas fa-paper-plane"></i> Gửi</button>
                              <button class="btn btn-secondary" id="cancelnormalbutton"> <i class="fas fa-window-close"></i> Hủy</button>
                            </div>
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
                    <button class="btn btn-success" id="addnewdepartment" style="margin-top: 20px;"><i class="fas fa-plus-circle"></i> Thêm mới</button>
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-3"></div>
                <div class="col-6 departmentimport">
                    <div class="text-center">
                        <form>
                            <fieldset class="form-group">
                              <label class="title">Nhập thông tin đơn vị mới</label>  
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                  <label for=""><i class="fas fa-id-card"></i> Tên đơn vị : </label>
                                </div>
                                <div class="col-7">
                                  <input type="text" class="form-control" name="departmentname" id="departmentname" placeholder="Nhập tên đơn vị">
                                </div>
                              </div>
                            </fieldset>
                            <fieldset class="form-group">
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                <label for=""><i class="fas fa-window-restore"></i> Loại đơn vị : </label>
                              </div>
                              <div class="col-7">
                                <select name="departmenttype" id="departmenttype" class="form-control">
                                  <option value="Bộ môn">Bộ môn</option>
                                  <option value="Phòng thí nghiệm">Phòng thí nghiệm</option>
                                </select>
                              </div>              
                            </fieldset>
                            <fieldset class="form-group">
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                <label for=""><i class="fas fa-building"></i> Địa chỉ : </label>
                              </div>
                              <div class="col-7">
                                <input type="text" class="form-control" name="departmentaddress" id="departmentaddress" placeholder="Nhập địa chỉ">
                              </div>              
                            </fieldset>
                            <fieldset class="form-group">
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                <label for=""><i class="fas fa-phone"></i> Điện thoại : </label>
                              </div>
                              <div class="col-7">
                                <input type="tel" class="form-control" name="departmentphone" id="departmentphone" placeholder="Nhập số điện thoại liên lạc">
                              </div>              
                            </fieldset>
                            <fieldset class="form-group">
                              <div class="row">
                                <div class="col-1"></div>
                                <div class="col-4 text-left">
                                  <label for=""><i class="fas fa-paper-plane"></i> Website : </label>
                                </div>
                                <div class="col-7">
                                  <input type="tel" class="form-control" name="departmentwebsite" id="departmentwebsite" placeholder="Nhập địa chỉ website">
                                </div>
                              </div>
                            </fieldset>                            
                            <div class="text-center">
                              <p class="btn btn-primary" id="addnormaldepartment" style="margin-bottom: 20px; cursor: pointer;"><i class="fas fa-paper-plane"></i> Gửi</p>
                              <p class="btn btn-secondary" id="canceldepartmentbutton" style="margin-bottom: 20px; cursor: pointer;"><i class="fas fa-window-close"></i> Hủy</p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-3"></div>
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
@routes
<script type="text/javascript" src="{{URL::asset('js/admin.js')}}"></script>
@endsection