<?php

namespace App\Http\Controllers;
use App\Staff;
use App\Field;
use App\Topic;
use App\Department;
use Illuminate\Support\Facades\Input;
use Auth;
use Validator;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        $field = Field::all();
        $department = Department::all();
        return view('staff.index')-> with(compact('department'))
                                  -> with(compact('field'))
                                  -> with(compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return Topic::all();
        // return view('staffs.new');
        return Staff::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($account)
    {
        $staff = Staff::where('account','=',$account)->get()->get(0);
        $fields = $staff->fields;
        $field = [];
        foreach ($fields as $element) {
            if($this->isSmallestChild($element)){
                array_push($field,$element);
            }
        }
        $topic = Topic::all();
        $department = Department::all();
        return view('staff.staff_view')-> with(compact('department'))
                                  -> with(compact('field'))
                                  -> with(compact('staff'))
                                  -> with(compact('topic'));
    }

    private function isSmallestChild($child){
        $fields = Field::all();
        foreach ($fields as $element) {
            if ($child->id == $element->childOf)
                return false;
        }
        return true;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $staff = Auth::user()->staff;
        return view('staff.edit_info',compact('staff'));
    }

    public function edit_field()
    {
        $staff = Auth::user()->staff;
        $fields = Field::all();
        return view('staff.edit_field')-> with(compact('fields'))
                                       -> with(compact('staff'));
    }

    public function edit_topic()
    { 
        $staff = Auth::user()->staff;
        $topic = $staff->topics;
        return view('staff.edit_topic',compact('staff'));
    }

    public function updateInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'phone' => 'max:11',
           'gmail' => 'required|email'
        ]);
        $staff = Auth::user()->staff;
        // if ($validator->fails()){
        //   return json_encode([
        //     'state' => 'Fail',
        //     'error' => 'Thông tin không đúng định dạng'
        //   ]);
        // }
        $phone = $request->input('phone');
        $gmail = $request->input('gmail');
        $website = $request->input('website');
        $address = $request->input('address');

        $staff->update([
            'phone' => $phone,
            'gmail' => $gmail,
            'website' => $website,
            'address' => $address
        ]);
        return json_encode([
          'state' => 'Success',
          'updated_staff' => $staff
        ]);
    }

    public function updateField(Request $request)
    {
        $list = $request->ids;
        $staff = Auth::user()->staff;
        $staff->fields()->sync($list);
        return json_encode([
          'state' => 'Success',
          'updated_fields' => $staff->fields
        ]);
    }
}
