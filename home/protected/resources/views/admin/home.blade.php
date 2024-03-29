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
            <div class="row">
              <div class="tabletitle">
                <p style="width: 5%; float: left;">STT</p>                
                <p style="width: 10%; float: left;">Mã cán bộ</p>                
                <p style="width: 10%; float: left;">Họ và tên</p>                
                <p style="width: 10%; float: left; margin-left: -0.3%;">Tài khoản</p>                
                <p style="width: 25%; float: left;">VNU Email</p>                
                <p style="width: 10%; float: left; margin-left: -0.5%;">Loại cán bộ</p>                
                <p style="width: 10%; float: left;">Học vị</p>                
                <p style="width: 10%; float: left; margin-left: -0.6%;">Đơn vị công tác</p>                
                <p style="width: 10%; float: left;">Thao tác</p>                
              </div>
            </div>
            <div class="row" id="user">
                <table class="table" style="text-align: center;">
                    <tbody id="userbody">
                        <?php $count = 1; foreach ($user as $element): ?>
                            <tr style="width: 100%;">
                                <?php $staff = $element->staff ?>
                                <td style="width: 5%;"><?php echo $count; $count++; ?></td>
                                <td style="width: 10%;">{{$staff->code}}</td>
                                <td style="width: 10%;">{{$staff->name}}</td>
                                <td style="width: 10%;">{{$staff->account}}</td>
                                <td style="width: 25%;">{{$staff->vnu_email}}</td>
                                <td style="width: 10%;">{{$staff->staff_type}}</td>
                                <td style="width: 10%;">{{$staff->degree}}</td>
                                <td style="width: 10%;">{{$staff->department->name}}</td>
                                <td style="width: 10%;">
                                    <button class="btn btn-primary" data-id="{{$staff->user_id}}" onclick="edituser(this)" style="margin: 5px 5px;"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger" data-id="{{$staff->user_id}}" onclick="deleteuser(this)" style="margin: 5px 5px;"><i class="fas fa-trash"></i></button>
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
                            <p class="btn btn-secondary" id="cancelexcelbutton" style="cursor: pointer; margin-top: 15px;" > <i class="fas fa-window-close"></i> Hủy</p>
                          </fieldset>  
                          <fieldset>
                            <div class="excelstatus">
                              
                            </div>
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
                              <label class="title">Nhập thông tin cán bộ</label>  
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
                                <div class="col-4 text-left"></div>
                              <div class="col-7">
                                <input type="text" hidden="" class="form-control" name="user_id" id="user_id"></div>              
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
                                      <?php foreach ($alldepartment as $element): ?>
                                          <option value="{{$element->id}}">{{$element->name}}</option>
                                      <?php endforeach ?>
                                  </select>
                                </div>
                              </div>
                            </fieldset>
                            <div class="text-center">
                              <button type="submit" name="create" class="btn btn-primary sendstaff"> <i class="fas fa-paper-plane"></i> Gửi</button>
                              <button type="submit" name="update" class="btn btn-success editstaff"> <i class="fas fa-edit"></i> Cập nhật</button>
                              <p class="btn btn-secondary" id="cancelnormalbutton" style="cursor: pointer; margin-top: 15px;" > <i class="fas fa-window-close"></i> Hủy</p>
                            </div>
                            <div class="status text-center">
                              
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
            
            <div class="row">
              <div class="tabletitle">
                <p style="width: 5%; float: left;">STT</p>                
                <p style="width: 25%; float: left;">Tên đơn vị</p>                
                <p style="width: 15%; float: left;">Loại đơn vị</p>                
                <p style="width: 10%; float: left;">Địa chỉ</p>                
                <p style="width: 10%; float: left;">Điện thoại</p>                
                <p style="width: 25%; float: left;">Website</p>                
                <p style="width: 10%; float: left; margin-left: -1%;">Thao tác</p>                
              </div>
            </div>

            <div class="row" id="department">
                <table class="table">
                    <tbody id="departmentbody">                    
                        <?php $count = 1; foreach ($alldepartment as $element): ?>
                            <tr style="text-align: center; width: 100%;">
                                <td style="width: 5%;"><?php echo $count; $count++; ?></td>    
                                <td style="width: 25%;">{{$element->name}}</td> 
                                <td style="width: 15%;">{{$element->type}}</td> 
                                <td style="width: 10%;">{{$element->address}}</td>  
                                <td style="width: 10%;">{{$element->phone}}</td>    
                                <td style="width: 25%;">{{$element->website}}</td>  
                                <td style="width: 10%;">
                                    <button class="btn btn-primary" data-id="{{$element->id}}" style="margin: 5px 5px;" onclick="editdepartment(this)"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger" data-id="{{$element->id}}" onclick="deletedepartment(this)" style="margin: 5px 5px;"><i class="fas fa-trash"></i></button>
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
                  <form id="departmentform">
                    {{csrf_field()}}
                      <fieldset class="form-group">
                        <label class="title">Nhập thông tin đơn vị</label>  
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
                        </div>
                        <div class="col-7">
                          <input type="text" hidden="" name="department_id" id="department_id">
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
                        <button type="submit" name="create" class="btn btn-primary addnormaldepartment"> <i class="fas fa-paper-plane"></i> Gửi</button>
                        <button type="submit" name="update" class="btn btn-success editnormaldepartment"> <i class="fas fa-edit"></i> Cập nhật</button>
                        <p class="btn btn-secondary" id="canceldepartmentbutton" style="cursor: pointer; margin-top: 15px;" > <i class="fas fa-window-close"></i> Hủy</p>
                      </div>
                      <div class="departmentstatus">
                        
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
                            <i class="dropdownicon fas fa-caret-right"></i>
                            <span>{{$element->name}}</span>
                            <i class="fas fa-plus-square" style="cursor: pointer;" onclick="newfield(this)"></i>
                            <i class="fas fa-pen-square" style="cursor: pointer;" onclick="editfield(this)"></i>
                            <i class="fas fa-minus-square" style="cursor: pointer;" onclick="deletefield(this)"></i>  
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
                    <button class="btn btn-success" id="addnewfield" style="margin-top: 20px;"><i class="fas fa-plus-circle"></i> Thêm mới</button>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-3"></div>
          <div class="col-6 fieldimport">
              <div class="text-center">
                  <form id="fieldform">
                    {{csrf_field()}}
                      <fieldset class="form-group">
                        <div class="row">
                          <div class="col-1"></div>
                          <div class="col-4 text-left">
                        </div>
                        <div class="col-7">
                          <input type="text" hidden="" name="field_id" id="field_id">
                        </div>              
                      </fieldset>
                      <fieldset class="form-group">
                        <label class="title">Nhập thông tin lĩnh vực nghiên cứu</label>  
                        <div class="row">
                          <div class="col-1"></div>
                          <div class="col-4 text-left">
                            <label for=""><i class="fas fa-id-card"></i> Tên lĩnh vực nghiên cứu : </label>
                          </div>
                          <div class="col-7">
                            <input type="text" class="form-control" name="fieldname" id="fieldname" placeholder="Nhập tên lĩnh vực nghiên cứu">
                          </div>
                        </div>
                      </fieldset>
                      <div class="text-center">
                        <button type="submit" name="create" class="btn btn-primary addnormalfield"> <i class="fas fa-paper-plane"></i> Gửi</button>
                        <button type="submit" name="update" class="btn btn-success editnormalfield"> <i class="fas fa-edit"></i> Cập nhật</button>
                        <p class="btn btn-secondary" id="cancelfieldbutton" style="cursor: pointer; margin-top: 15px;" > <i class="fas fa-window-close"></i> Hủy</p>
                      </div>
                      <div class="fieldstatus"></div>                   
                      
                  </form>
              </div>
          </div>
          <div class="col-3"></div>
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
<script>
  
  function hide(variable) {
    variable.parentNode.parentNode.style.display = "none";
  }

  function edituser (variable) {
    var sendstaff = document.querySelector(".sendstaff");
    sendstaff.classList.add("hide");

    var editstaff = document.querySelector(".editstaff");
    editstaff.classList.add("showbutton");

    var father = variable.parentNode.parentNode;
    var user_id = document.getElementById("user_id");
    var code = document.getElementById("code");
    var name = document.getElementById("name");
    var account = document.getElementById("account");
    var email = document.getElementById("email");
    var staff_type = document.getElementById("staff_type");
    var degree = document.getElementById("degree");
    var work_unit = document.getElementById("work_unit");
    var layer = document.querySelector(".homelayer");
    var normalimport = document.querySelector(".normalimport");

    user_id.value = variable.getAttribute("data-id");
    code.value = father.cells[1].innerText;
    name.value = father.cells[2].innerText;
    account.value = father.cells[3].innerText;
    email.value = father.cells[4].innerText;
    staff_type.value = father.cells[5].innerText;
    degree.value = father.cells[6].innerText;
    var departmentinfo = father.cells[7].innerText;
    var optionarr = work_unit.querySelectorAll("option");
    for (var i = 0; i < optionarr.length; i++) {
      if (optionarr[i].innerHTML == departmentinfo) {
        work_unit.value = optionarr[i].value;
        break;
      }
    }
    layer.classList.add("showlayer");
    normalimport.classList.add("showimport");
  }

  function deleteuser(variable) {
    var id = variable.getAttribute("data-id");
    var newrequest = new XMLHttpRequest();
    newrequest.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var data = $.parseJSON(this.response);      
        if (data.state == "Success") {
          var father = variable.parentNode.parentNode;
          father.style.display = "none";
          var row = document.querySelectorAll("#userbody tr");
          index = 0;
          for (var i = 0; i < row.length; i++) {
            if (row[i].style.display != 'none') {
              index++;
              row[i].cells[0].innerText = index;
            }
          }
        } else {
          // Xóa lỗi
        }
      } else {
        console.log('error');
      }
    }
    newrequest.open("GET", route('admin.delete.user') + "?id=" + id, true);
    newrequest.send();
  }

  function editdepartment (variable) {
     var editnormaldepartment = document.querySelector(".editnormaldepartment");
     editnormaldepartment.classList.add("showbutton");

     var addnormaldepartment = document.querySelector(".addnormaldepartment");
     addnormaldepartment.classList.add("hide");  

     var father = variable.parentNode.parentNode;
     
     var department_id = document.getElementById("department_id");
     var departmentname = document.getElementById("departmentname");
     var departmenttype = document.getElementById("departmenttype");
     var departmentaddress = document.getElementById("departmentaddress");
     var departmentphone = document.getElementById("departmentphone");
     var departmentwebsite = document.getElementById("departmentwebsite");
     var layer = document.querySelector(".homelayer");
     var departmentimport = document.querySelector(".departmentimport");

     department_id.value = variable.getAttribute("data-id");
     departmentname.value = father.cells[1].innerText;
     departmenttype.value = father.cells[2].innerText;
     departmentaddress.value = father.cells[3].innerText;
     departmentphone.value = father.cells[4].innerText;
     departmentwebsite.value = father.cells[5].innerText;
     
     layer.classList.add("showlayer");
     departmentimport.classList.add("showimport");
  }

  function deletedepartment(variable) {
    var id = variable.getAttribute("data-id");
    var newrequest = new XMLHttpRequest();
    newrequest.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var data = $.parseJSON(this.response);      
        if (data.state == "Success") {
          var father = variable.parentNode.parentNode;
          father.style.display = "none";
          var row = document.querySelectorAll("#departmentbody tr");
          index = 0;
          for (var i = 0; i < row.length; i++) {
            if (row[i].style.display != 'none') {
              index++;
              row[i].cells[0].innerText = index;
            }
          }
        } else {
          // Xóa không thành công
        }
      } else {
        console.log('error');
      }
    }
    newrequest.open("GET", route('admin.delete.department') + "?id=" + id, true);
    newrequest.send();
  }

  function newfield(varibale){
    var fieldimport = document.querySelector(".fieldimport"), layer = document.querySelector(".homelayer");
    fieldimport.classList.add("showimport");
    layer.classList.add("showlayer");

    var editnormalfield = document.querySelector(".editnormalfield");
    editnormalfield.classList.remove("showbutton");

    var addnormalfield = document.querySelector(".addnormalfield");
    addnormalfield.classList.remove("hide");

    var fieldname = document.getElementById("fieldname");
    fieldname.value = "";
    var fieldid = document.getElementById("field_id");
    fieldid.value = varibale.parentNode.getAttribute("data-id");
  }

  function editfield(variable) {
    var editnormalfield = document.querySelector(".editnormalfield");
    editnormalfield.classList.add("showbutton");

    var addnormalfield = document.querySelector(".addnormalfield");
    addnormalfield.classList.add("hide");

    var father = variable.parentNode;
    
    var fieldname = document.getElementById("fieldname");
    var fieldid = document.getElementById("field_id");
    var fieldimport = document.querySelector(".fieldimport");
    var layer = document.querySelector(".homelayer");  
    fieldname.value = father.children[1].innerText;
    fieldid.value = father.getAttribute("data-id");
    layer.classList.add("showlayer");
    fieldimport.classList.add("showimport");
  }

  function deletefield(variable){
    var id = variable.parentNode.getAttribute('data-id');
    var newrequest = new XMLHttpRequest();
    newrequest.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var data = $.parseJSON(this.response);      
        if (data.state == "Success") {
          var father = variable.parentNode;
          father.style.display = "none";
        } else {
          // Xóa lỗi
        }
      } else {
        console.log('error');
      }
    }
    newrequest.open("GET", route('admin.delete.field') + "?id=" + id, true);
    newrequest.send();
  }
</script>
@endsection