<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Staff;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTopic(Request $request,$id)
    {
        switch ($request->input('action')) {
            case 'new':
                $name = $request->input('name');
                $detail = $request->input('detail');
                $topic = Topic::create([
                    'name' => $name,
                    'detail' => $detail,
                    'staff_id' => $id
                ]);
                $list = Staff::find($id)->topics;
                return $list;
                // return $topic;
                // return $request->input('action');

            case 'update':
                $name = $request->input('name');
                $detail = $request->input('detail');
                return $request->input('action');

            // case 'delete':
            //     $this->destroy($request);
            //     break;
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
}
