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
}