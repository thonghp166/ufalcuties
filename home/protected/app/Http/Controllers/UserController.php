<?php

namespace App\Http\Controllers;

use App\User;
use App\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Excel;
use File;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Input;
use Validator;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'email' => 'required|email|unique:users',
           'account' => 'required|string|max:50',
            'code' => 'required|unique:staff'
        ]);

        if ($validator->fails()){
            return json_encode([
                'state' => 'Fail',
                'error' => 'Thông tin không đúng định dạng'
            ]);
        } else {
            $email = $request->email;
            $username = $request->account;
            $password = bcrypt('12345678');

            $user = User::create([
                'email' => $email,
                'username' => $username,
                'password' => $password,
            ]);

            $name = $request->name;
            $code = $request->code;
            $vnu_email = $email;
            $account = $username;
            $staff_type =  $request->staff_type;
            $degree = $request->degree;
            $work_unit = $request->work_unit;
            $staff_id = $user->id;

            $staff = Staff::create([
                'name' => $name,
                'code' => $code,
                'vnu_email' => $vnu_email,
                'account' => $account,
                'staff_type' => $staff_type,
                'degree' => $degree,
                'work_unit' => $work_unit,
                'user_id' => $staff_id,
            ]);
            return json_encode([
                'state' => 'Success',
                'new_user' => $user
            ]);
        }
    }

    public function importExcel(Request $request)
    {
        if($request->hasFile('excelfile')){
            $file = Input::file('excelfile');
            $extension = File::extension($file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                $filepath = time().$file->getClientOriginalName();
                $upload = $file->move('upload',$filepath);
                $collection = Excel::toCollection(new UsersImport, $upload)->get(0);
                File::delete($upload);
                if (!$collection->isEmpty()){
                    $new_users = [];
                    $collection->pop();
                    foreach ($collection as $value) {
                        $new_user = $this->saveFromExcel($value);
                        if ($new_user == null) {                    
                            Session::flash('error', 'Lỗi khi thêm tài khoản');
                            return json_encode([
                                'state' => 'Fail',
                                'error' => 'Tạo mới không thành công'
                            ]);
                        } else {
                            array_push($new_users,$new_user);
                        }
                    }
                    Session::flash('success', 'Đã thêm thành công');
                    $data = ['state'=> 'Success','new_users' => $new_users];
                    return json_encode($data);
                } else {
                    return json_encode(['state'=> 'Fail','error' => 'Không có dữ liệu']);
                }
            } else {
                Session::flash('error', 'Sai định dạng');
                return json_encode([
                    'state' => 'Fail',
                    'error' => 'File sai định dạng'
                ]);
            }
        } else {
            return json_encode([
                    'state' => 'Fail',
                    'error' => 'Không có file'
                ]);
        }
    }
            
    private function saveFromExcel($element){
        $name = $element->get('ho_va_ten');
        $username = $element->get('ten_dang_nhap');
        $email = $element->get('vnu_email');
        $password = bcrypt($element->get('mat_khau'));
        if ($this->checkValidate($username, $email)){
            $user = User::create([
                'username' => $username,
                'password' => $password,
                'email' => $email
            ]);
            $staff = Staff::create([
                'name' => $name,
                'vnu_email' => $email,
                'user_id' => $user->id,
                'account' => $username,
            ]);
            return $user;
        } else {
            return null;
        }
    }

    private function checkValidate($username, $email){
        if (User::where('username','=',$username)->where('email','=',$email)->exists())
            return false;
        return true;
    }

    public function updateUser()
    {
    }
}