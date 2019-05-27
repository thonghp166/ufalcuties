<?php

namespace App\Http\Controllers;

use App\User;
use App\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Excel;
use File;
use App\Imports\UsersImport;

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

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'code' => 'required|unique:staff'
        ]);


        $email = $request->input('email');
        $username = $request->input('username');
        $password = bcrypt('12345678');


        $user = User::create([
            'email' => $email,
            'username' => $username,
            'password' => $password,
        ]);

        $name = $request->input('name');
        $code = $request->input('code');
        $vnu_email = $email;
        $account = $request->input('username');
        $staff_type =  $request->input('staff_type');
        $degree = $request->input('degree');
        $work_unit = $request->input('work_unit');
        $staff_id = $user->id;

        $staff = Staff::create([
            'name' => $name,
            'code' => $code,
            'vnu_email' => $vnu_email,
            'account' => $account,
            'staff_type' => $staff_type,
            'degree' => $degree,
            'work_unit' => $work_unit,
            'staff_id' => $staff_id,
        ]);

        return redirect()->back();
    }

    public function importExcel(Request $request)
    {
        $this->validate($request, array(
            'file'      => 'required'
        ));
        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                $file = $request->file;
                $collection = Excel::toCollection(new UsersImport, $file)->get(0);

                if (!$collection->isEmpty()){
                    $collection->pop();

                    foreach ($collection as $value) {
                        if (!$this->saveFromExcel($value)) {                    
                            Session::flash('error', 'Lỗi khi thêm tài khoản');
                            return 'Fail qua';
                        }
                    }
                    Session::flash('success', 'Đã thêm thành công');
                    return "success";
                } else {
                    Session::flash('error', 'Sai định dạng');
                    return 'Wrong file type';
                }
            }
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
        } else {
            return false;
        }
        return true;
    }

    private function checkValidate($username, $email){
        if (User::where('username','=',$username)->where('email','=',$email)->exists())
            return false;
        return true;
    }
}