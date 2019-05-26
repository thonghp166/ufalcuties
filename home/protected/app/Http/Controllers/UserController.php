<?php

namespace App\Http\Controllers;

use App\User;
use App\Staff;
use App\Http\Controllers\Controller;

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
        $email = $request->input('vnu_email');
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
        $name = $request->input('username');


        
    }

}