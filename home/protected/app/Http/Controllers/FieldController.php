<?php

namespace App\Http\Controllers;
Use App\Field;

use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $field = Field::all();
        return view('field',compact('field'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



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
    public function delete(Request $request)
    {
        $id = $request->id;
        $field = Field::find($id);
        $this->destroyChild($field);
        Field::destroy($id);
        return json_encode([
            'state' => 'Success',
            'deleted_id' => $id
        ]);
    }

    private function destroyChild($field){
        $child = $this->getChild($field);
        if (count($child) == 0){
            Field::destroy($field->id);
        } else {
            foreach ($child as $element) {
                $this->destroyChild($element);
            }
        }
    }

    private function getChild($field){
        $fields = Field::all();
        $id = $field->id;
        $child = [];
        foreach ($fields as $element) {
            if ($id == $element->childOf){
                array_push($child,$element);
            }
        }
        return $child;
    }
}
