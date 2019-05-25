<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Input;

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


    public function store(Request $request){
        $name = $request->input('name');
        $type = $request->input('type');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $website = $request->input('website');
        Department::create([
            'name' => $name,
            'type' => $type,
            'address' => $address,
            'phone' => $phone,
            'website' => $website
        ]);
        return redirect()->route('admin.home')->with('status','Đã thêm mới thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $department = Department::find($request->input('id'));
        $name = $request->input('name');
        $type = $request->input('type');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $website = $request->input('website');

        $department->update([
            'name' => $name,
            'type' => $type,
            'address' => $address,
            'phone' => $phone,
            'website' => $website
        ]);
        return redirect()->route('admin.home')->with('status', 'Đã cập nhật thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Department::destroy($id);
        return redirect()->route('admin.home')->with('status','Đã xóa thành công');
    }
}
