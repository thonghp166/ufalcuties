<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function change(Request $request)
    {
    	$this->validate($request, [
        	'old_password'     => 'required',
        	'new_password'     => 'required|min:6',
        	'confirm_password' => 'required|same:new_password',
    	]);
    	$data = [
            'old_password' => $request->input('old_password'),
            'new_password' => $request->input('new_password'),
            'confirm_password' => $request->input('confirm_password'),
        ];
    	$user = User::find(auth()->user()->id);
    	if(!Hash::check($data['old_password'], $user->password)){
         	return redirect()->back()->with('error', 'Đổi mật khẩu không thành công');
    	} else {
       		$user->update([
       			'password' => bcrypt($data['new_password'])
       		]);
       		return redirect()->back()->with('status','Đổi mật khẩu thành công');
        }
    }
}
