<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Staff;
use Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topic = Topic::all();
        return $topic;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = Staff::find(1);
        return $staff->topics;
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $name = $request->name;
        $detail = $request->detail;
        $topic_id = $request->id;
        $id = Auth::user()->staff->id;
        $topic = Topic::find($topic_id);
        if (Topic::where('staff_id', '=', $id)->
                   where('id', '!=', $topic_id)->
                   where('name', '=', $name)->
                   where('detail', '=', $detail)->exists()) {
            return response()->json([
                'state' => 'Fail',
                'error' => $name        
            ]);
        }
        $topic->update([
            'name' => $name,
            'detail' => $detail
        ]);

        return response()->json([
            'state' => 'Success',
            'update_id' => $topic->id
        ]);
    }


    public function add(Request $request)
    {
        $name = $request->name;
        $detail = $request->detail;
        $id = Auth::user()->staff->id;
        if (Topic::where('staff_id', '=', $id)->
            where('name', '=', $name)->where('detail', '=', $detail)->exists()) {
            return response()->json([
            'state' => 'Fail',
            'error' => 'Trùng thông tin'
        ]);
        }
        $topic = Topic::create([
            'name' => $name,
            'detail' => $detail,
            'staff_id' => $id
        ]);
        return response()->json([
            'state' => 'Success',
            'new_id' => $topic->id
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Topic::destroy($id);
        return response()->json([
            'state' => 'Success',
            'delete_id' => $id
        ]);
    }

}
