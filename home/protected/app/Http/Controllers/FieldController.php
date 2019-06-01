<?php

namespace App\Http\Controllers;
Use App\Field;

use Illuminate\Http\Request;

class FieldController extends Controller
{
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $id = $request->field_id;
        $name = $request->fieldname;
        if (Field::where('name','=',$name)->exists()){
            return json_encode([
                'state' => 'Fail',
                'error' => 'Lĩnh vực đã tồn tại'
            ]);
        }
        $field = Field::create([
            'name' => $name,
            'childOf' => $id
        ]);
        // dd($field);
        $fields = Field::all();
        return json_encode([
            'state' => 'Success',
            'all' => $fields
        ]);
    }



    public function update(Request $request)
    {
        $id = $request->field_id;
        $newName = $request->fieldname;
        $field = Field::find($id);
        $id_parent = $field->childOf;
        if(Field::where('childOf','=',$id_parent)->where('name','=',$newName)->exists()){
            return json_encode([
                'state' => 'Fail',
                'error' => 'Trùng thông tin'
            ]);
        }
        $field->update([
            'name' => $newName
        ]);
        return json_encode([
            'state' => 'Success',
            'update_field' => $field
        ]);
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
