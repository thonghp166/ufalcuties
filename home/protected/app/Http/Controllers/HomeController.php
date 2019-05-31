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
        $department = Department::where('name','!=','Không')->get();
        return view('staff.index')-> with(compact('department'))
                                  -> with(compact('field'))
                                  -> with(compact('staff'));
    
    }

    public function searchtype($type,$name)
    {
      $staff = Staff::all();
      $field = Field::all();
      $department = Department::where('name','!=','Không')->get();
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

    public function searchByDepartment(Request $request)
    {
        $id = $request->id;
        $staff_list = Department::find($id)->staffs;
        return json_encode([
            'state' => 'Success',
            'results' => $staff_list
        ]);
    }

    public function searchText(Request $request)
    {
      
      $id = $request->id;
      $text = $request->text;
      switch ($id) {
        case 0:
          return json_encode([
            'state' => 'Success',
            'results' => 'None'
          ]);
        case 1:
          $res = Field::where('name','LIKE','%' .$text . '%')->get();
          return json_encode([
            'state' => 'Success',
            'results' => $res
          ]);
        case 2:
          $res = Department::where('name','LIKE','%' .$text . '%')->get();
          return json_encode([
            'state' => 'Success',
            'results' => $res
          ]);
        case 3:
          $res = Staff::where('name','LIKE','%' .$text . '%')->get();
          return json_encode([
            'state' => 'Success',
            'results' => $res
          ]);
      }
    }
    
}
