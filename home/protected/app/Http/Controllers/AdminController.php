<?php

namespace App\Http\Controllers;

use App\User;
use App\Staff;
use App\Field;
use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use File;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Input;
use Validator;



class AdminController extends Controller
{
    /**
     * Display a admin control home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$user = User::where('level','=',0)->get();
    	$field = Field::all();
    	$alldepartment = Department::where('name','!=','Không')->get();
        return view('admin.home')-> with(compact('alldepartment'))
                               	 -> with(compact('field'))
                                 -> with(compact('user'));
    }

    /**
     * Admin delete user.
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->delete();
        return json_encode([
            'state' => 'Success'
        ]);
    }

    /**
     * Admin update user.
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
        $user = User::where('id','=',$request->user_id)->first();
        $staff = $user->staff;
        $validator = Validator::make($request->all(), [
           'email' => 'required|email|unique:users,email,'.$user->id,
           'account' => 'required|string|max:50|unique:staff,account,'.$staff->id,
           'code' => 'required|unique:staff,code,'.$staff->id
        ]);

        if ($validator->fails()){
            return json_encode([
                'state' => 'Fail',
                'error' => $validator->errors()
            ]);
        } else {
            $email = $request->email;
            $username = $request->account;
            $user->update([
                'email' => $email,
                'username' => $username
            ]);

            $name = $request->name;
            $code = $request->code;
            $vnu_email = $email;
            $account = $username;
            $staff_type =  $request->staff_type;
            $degree = $request->degree;
            $department_id = $request->work_unit;

            $staff->update([
                'name' => $name,
                'code' => $code,
                'vnu_email' => $vnu_email,
                'account' => $account,
                'staff_type' => $staff_type,
                'degree' => $degree,
                'department_id' => $department_id
            ]);
            return json_encode([
                'state' => 'Success',
                'update_user' => $user
            ]);
        }
    }

    /**
    * Add new user by admin
    * @param \Illuminate\Http\Request
    *
    * @return \Illuminate\Http\Response
    */
    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'email' => 'required|email|unique:users',
           'account' => 'required|unique:staff|string|max:50',
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
            $department_id = $request->work_unit;
            $staff_id = $user->id;

            $staff = Staff::create([
                'name' => $name,
                'code' => $code,
                'vnu_email' => $vnu_email,
                'account' => $account,
                'staff_type' => $staff_type,
                'degree' => $degree,
                'department_id' => $department_id,
                'user_id' => $staff_id,
            ]);
            return json_encode([
                'state' => 'Success',
                'new_user' => $user
            ]);
        }
    }

    /**
    * Import from excel
    * @param \Illuminate\Http\Request
    *
    * @return \Illuminate\Http\Response
    */
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
                    // $collection;
                    foreach ($collection as $value) {
                        $new_user = $this->saveFromExcel($value);
                        if ($new_user == null) {
                            return json_encode([
                                'state' => 'Fail',
                                'error' => 'Tạo mới không thành công'
                            ]);
                        } else {
                            array_push($new_users,$new_user);
                        }
                    }
                    $data = ['state'=> 'Success','new_users' => $new_users];
                    return json_encode($data);
                } else {
                    return json_encode(['state'=> 'Fail','error' => 'Không có dữ liệu']);
                }
            } else {
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
    /**
    * Create new user and new staff 
    * @param element data 
    * 
    * @return new user
    */
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
                'code' => 'NEW'.$user->id
            ]);
            $account_info = [
                'username' => $username,
                'email' => $email,
                'name' => $name,
                'id' => $user->id
            ];
            return $account_info;
        } else {
            return null;
        }
    }
    /**
    * Check if user has been created
    * @param element data 
    * 
    * @return true if validate success
    */
    private function checkValidate($username, $email){
        if (User::where('username','=',$username)->where('email','=',$email)->exists())
            return false;
        return true;
    }


}
