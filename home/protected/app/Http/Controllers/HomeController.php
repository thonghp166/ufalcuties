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
        $staff = Staff::where('name','!=','Administrator')->get();
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
      $id = 0;
      switch ($type) {
        case 'all':
          $results = $staff;
          break;
        case 'field':
          $results = $this->searchByField($name);
          $field = Field::where('name','=',$name)->first();
          $id = $field->id;
          break;
        case 'department':
          $results = $this->searchByDepartment($name);
          $department = Department::where('name','=',$name)->first();
          $id = $department->id;
          break;
      }
      $field = Field::all();
      $department = Department::where('name','!=','Không')->get();
      return view('staff.index')-> with(compact('department'))
                                -> with(compact('field'))
                                -> with(compact('staff'))
                                -> with(compact('type'))
                                -> with(compact('id'))
                                -> with(compact('results'));
      }

    private function searchByDepartment($name)
    {
      $department = Department::where('name','=',$name)->first();
      $res = $department->staff;
      return $res;
    }
    private function searchByField($name){
      $field = Field::where('name','=',$name)->first();
      $res = $field->staffs;
      return $res;
    }

    private function searchByDepartmentAndText($text,$id)
    {
      $staff = Staff::where('department_id','=',$id)->where('name','LIKE','%' .$text . '%')->get();
      return $staff;
    }

    public function searchText(Request $request)
    {
      $field_id = $request->field;
      $department_id = $request->department;
      $text = $request->text;
      if ($field_id == 'all' and $department_id == 'all'){
          $staff= Staff::where('name','LIKE','%'.$text .'%')->get(); 
          $result = $staff;
      } else {
        if ($field_id == 'all'){
          $result = $this->searchByDepartmentAndText($text,$department_id);
        } else if ($department_id == 'all'){
          $field = Field::find($field_id);
          $staff_list = $field->staffs;
          $res = [];
          foreach ($staff_list as $element) {
            if (strpos($element->name,$text) !== false)
              array_push($res, $element);
          }
          $result = $res;
        } else {

        }
      }
      return json_encode([
        'state' => 'Success',
        'results' => $result
      ]);
    }
}
