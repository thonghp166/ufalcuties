<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Canbo;
use App\Field;

class MainController extends Controller
{
    //
    public function getHome()
    {
    	$department = Department::all();
    	$staff = Canbo::all();
    	$field = Field::all();
    	return view('welcome') -> with(compact('department'))
    						   -> with(compact('field'))
    						   -> with(compact('staff'));
    }
}
