<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Field;
use App\Staff;
use Validator;
use Illuminate\Support\Facades\Input;


class HomeController extends Controller
{


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

    public function search()
    {
        $staff = Staff::all();
        $field = Field::all();
        $department = Department::all();
        return view('staff.index')-> with(compact('department'))
                                  -> with(compact('field'))
                                  -> with(compact('staff'));
    
    }

    public function test()
    {
        return view('test');
    }

    public function searchByField(Request $request)
    {
        $id = $request->id;
        $staff_list = Field::find($id)->staffs;
        return json_encode([
            'state' => 'Success',
            'results' => $staff_list
        ]);
    }

    // public function searchByField

}
