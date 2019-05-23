<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Field;
use App\Staff; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        $field = Field::all();
        $department = Department::all();
        return view('welcome') -> with(compact('department'))
                               -> with(compact('field'))
                               -> with(compact('staff'));
    }
}
