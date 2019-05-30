<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Field;
use App\Department;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$user = User::where('level','=',0)->get();
    	$field = Field::all();
    	$alldepartment = Department::all();
        return view('admin.home')-> with(compact('alldepartment'))
                               	 -> with(compact('field'))
                                 -> with(compact('user'));
    }
}
