<?php

namespace App\Http\Controllers;
use App\Staff;
use App\Field;
use Illuminate\Support\Facades\Input;


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
        return view('staff.index',compact('staff'));
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
        $name = $request->input('name');
        $code = $request->input('code');
        $account = $request->input('account');
        $vnu_mail = $request->input('vnu_email');
        $staff_type = $request->input('staff_type');
        $degree = $request->input('degree');
        $work_unit = $request->input('work_unit');


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
            return "Success";
            // return redirect()->route('staff.new');
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
        return view('staff.staff_view',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        // return $staff;
        return view('staff.edit_info',compact('staff'));
    }

    public function edit_field($id)
    {   
        $staff = Staff::find($id);
        return view('staff.edit_field',compact('staff'));
    }

    public function edit_topic($id)
    {   
        $staff = Staff::find($id);
        return view('staff.edit_topic',compact('staff'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(Request $request, $id)
    {
        $staff = Staff::find($id);
        
        // $phone = $request->input('phone');
        // $gmail = $request->get('gmail');
        // $website = $request->get('website');
        // $address = $request->get('address');

        // $staff->update([
        //     'phone' => $phone,
        //     'gmail' => $gmail,
        //     'website' => $website,
        //     'address' => $address
        // ]);
        return Input::get('phone');
       // return redirect('staff/{{$staff->id}}/edit');
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

    public function updateField(Request $request,$id)
    {
        $staff = Staff::find($id);
        $new = Field::find($request->list);
        $staff->fields()->sync($new);
        return redirect()->route('staff.edit_field');
    }
}
