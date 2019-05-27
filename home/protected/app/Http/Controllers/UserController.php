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

    public function storeFromExcel(Request $request)
    {
        $this->validate($request, array(
            'file'      => 'required'
        ));
        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                $file = $request->file;
                $collection = Excel::toCollection(new UsersImport, $file)->get(0);
                return $collection;
            }
        }
    }
}