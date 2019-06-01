<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Staff;
use Validator;
use Illuminate\Support\Facades\Input;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = Department::all();
        return view('department',compact('department'));
    }


    public function add(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:department'
        ]);
        if ($validator->fails()){
            return json_encode([
                'state' => 'Fail',
                'error' => $validator->errors()
            ]);
        }
        $name = $request->departmentname;
        $type = $request->departmenttype;
        $address = $request->departmentaddress;
        $phone = $request->departmentphone;
        $website = $request->departmentwebsite;
        $department = Department::create([
            'name' => $name,
            'type' => $type,
            'address' => $address,
            'phone' => $phone,
            'website' => $website
        ]);

        return json_encode([
            'state' => 'Success',
            'new_department' => $department
        ]);
    }

    public function update(Request $request)
    {
        $department = Department::find($request->department_id);
        $validator = Validator::make($request->all(), [
           'name' => 'required|unique:department,name,'.$department->id
        ]);

        if ($validator->fails()){
            return json_encode([
                'state' => 'Fail',
                'error' => $validator->errors()
            ]);
        }
        $name = $request->departmentname;
        $type = $request->departmenttype;
        $address = $request->departmentaddress;
        $phone = $request->departmentphone;
        $website = $request->departmentwebsite;

        $department->update([
            'name' => $name,
            'type' => $type,
            'address' => $address,
            'phone' => $phone,
            'website' => $website
        ]);
        return json_encode([
            'state' => 'Success',
            'update_department' => $department
        ]);

    }

    
    public function delete(Request $request)
    {
        $id = $request->id;
        $department = Department::find($id);
        Staff::where('department_id','=',$id)->update([
            'department_id' => 1
        ]);
        $department->delete();
        return json_encode([
            'state' => 'Success'
        ]);
    }
}
