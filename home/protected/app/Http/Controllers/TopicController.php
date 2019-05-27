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
    public function update(Request $request,$id)
    {
        switch ($request->input('action')) {
            case 'new':
                $name = $request->input('name');
                $detail = $request->input('detail');
                if (Topic::where('staff_id', '=', $id)->
                    where('name', '=', $name)->where('detail', '=', $detail)->exists()) {
                    return 'Fail';
                }
                $topic = Topic::create([
                    'name' => $name,
                    'detail' => $detail,
                    'staff_id' => $id
                ]);
                return 'Success';


            case 'update':
                $name = $request->input('name');
                $detail = $request->input('detail');
                $id_topic = $request->input('topic_id');
                $topic = Topic::find($id_topic);
                $topic->update([
                    'name' => $name,
                    'detail' => $detail
                ]);
                return redirect()->back();

            case 'delete':
                Topic::destroy($request->input('topic_id'));
                return redirect()->back();
        }
        
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

    public function add(Request $request)
    {
        $name = $request->name;
        $detail = $request->detail;
        $id = Auth::user()->staff->id;
        if (Topic::where('staff_id', '=', $id)->
            where('name', '=', $name)->where('detail', '=', $detail)->exists()) {
            return 'Fail';
        }
        $topic = Topic::create([
            'name' => $name,
            'detail' => $detail,
            'staff_id' => $id
        ]);
        return 'Success';
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
}
