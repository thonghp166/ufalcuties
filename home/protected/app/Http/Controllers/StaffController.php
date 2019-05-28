<?php

namespace App\Http\Controllers;
use App\Staff;
use App\Field;
use App\Topic;
use App\Department;
use Illuminate\Support\Facades\Input;
use Auth;

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
            return redirect()->route('staff.new')->withError('Trùng vnu mail hoặc trùng tài khoản');
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
    public function show($account)
    {
        $staff = Staff::where('account','=',$account)->get()->get(0);
        $field = Field::all();
        $topic = Topic::all();
        $department = Department::all();
        return view('staff.staff_view')-> with(compact('department'))
                                  -> with(compact('field'))
                                  -> with(compact('staff'))
                                  -> with(compact('topic'));
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
        $staff = Auth::user()->staff;
        
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
        return redirect()->back()->with('status', 'Đã cập nhật thành công');
    }

    public function updateField(Request $request)
    {
        $list = $request->ids;
        $staff = Auth::user()->staff;
        $staff->fields()->sync($list);
        return redirect()->back()->with('status', 'Đã cập nhật thành công');
    }
}
