<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    	$data = $request->all();
 
    	$user = User::find(auth()->user()->id);
    	if(!Hash::check($data['old_password'], $user->password)){
         	return back()->with('error','Mật khẩu cũ không đúng');
    	}else{
       		$user::update([
       			'password' => bcrypt($data->new_password)
       		]);
       		return redirect('/')->with('status','Đổi mật khẩu thành công');
    	}
    }
}
