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

    public function test()
    {
      $staff = Staff::all();
      $field = Field::all();
      $department = Department::all();
      return view('test') -> with(compact('department'))
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
      $name = str_replace('+', ' ', $name);
      $staff = Staff::all();
      $results = [];
      switch ($type) {
        case 'all':
          $results = $staff;
          break;
        case 'field':
          $results = $this->searchByField($name);
          break;
        case 'department':
          $results = $this->searchByDepartment($name);
          break;
      }
      $field = Field::all();
      $department = Department::where('name','!=','Không')->get();
      return view('staff.index')-> with(compact('department'))
                                -> with(compact('field'))
                                -> with(compact('staff'))
                                -> with(compact('type'))
                                -> with(compact('name'))
                                -> with(compact('results'));
    }

    private function searchByField($name)
    {
        $field = Field::where('name','=',$name)->first();
        return $staff_list = $field->staffs; 
    }

    private function searchByDepartment($name)
    {
        $department = Department::where('name','=',$name)->first();
        return $staff_list = $department->staffs;
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
