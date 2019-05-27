<?php

use Illuminate\Database\Seeder;

class FieldStaffSeeder extends Seeder
{
    
    public function run()
    {
       $data = [
       		[
       			'staff_id'=> 1,
       			'field_id' => 1
       		],
       		[
       			'staff_id'=> 1,
       			'field_id' => 2
       		],
       		[
       			'staff_id'=> 1,
       			'field_id' => 3
       		],
       		[
       			'staff_id'=> 2,
       			'field_id' => 5
       		],
       		[
       			'staff_id'=> 1,
       			'field_id' => 4
       		]
       ];
       DB::table('field_staff')->insert($data);
       
    }
}
