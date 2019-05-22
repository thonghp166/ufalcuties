<?php

namespace App\Http\Controllers;
use App\Staff;


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
        return view('staff',compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $request;
        // return view('staffs.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = Input::get('name');
        $code = Input::get('code');
        $account = Input::get('account');
        $vnu_mail = input::get('vnu_email');
        $staff_type = Input::get('staff_type');
        $degree = Input::get('degree');
        $work_unit = Input::get('work_unit');


        if (Staff::where('vnu_email', '=', $vnu_email) -> exists() 
            or Staff::where('account', '=', $account) -> exists()) {
            return redirect()->route('staff.new')->withError('Trùng vnu mail hoặc trùng tài khoản')->withInput();
        } else {
            Staff::create([
                'name' => $name,
                'code' => $code, 
                'account' => $account, 
                'vnu_email' => $vnu_mail,
                'staff_type' => $staff_type,
                'degree' => $degree,      
                'work_unit' => $work_unit
            ]);
            return redirect()->route('staff.new');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);
        return $staff;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addTopic($id, $list) {
        $staff = Staff::find($id);
        $topic = Topic::find($list);
        $staff-> topics()-> attach($topic);
        return "Success";
    }

//     public function addField($id, $list_field) {
//         $staff = Staff::find($id);u
//         $field = Field::find($list_field);
//         $staff-> fields() -> attach($field);
//         return "Success";
//     }
//     public function removeField($id,$list_field){
//         $staff = Staff::find($id);
//         $field = Field::find($list_field);
//         $staff->fields()-> detach($field);
//         return "Success remove";
//     }

    public function updateField($id,$newlist)
    {
        $staff = Staff::find($id);
        $field = Field::all();
        $new = Field::find($newlist);
        $staff->fields()-> detach($field)->attach($new);
    }
}
