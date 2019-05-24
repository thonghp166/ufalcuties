<?php

use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
       		[
       			'name'=> 'Công nghệ thông tin',
       			'childOf' => 0
       		],
       		[
       			'name'=> 'Khoa học máy tính',
            'childOf' => 1
       		],
       		[
       			'name'=> 'Công nghệ phần mềm',
            'childOf' => 1
       		],
       		[
       			'name'=> 'Mạng máy tính',
       			'childOf' =>  1
       		],
       		[
       			'name'=> 'Điện tử viễn thông',
            	'childOf' => 0,
       		],
	        [
	            'name'=> 'DVT2',
	            'childOf' => 5,
	        ],
	        [
	            'name'=> 'DVT1',
	            'childOf' => 5,
	        ],
       ];
       DB::table('field')->insert($data);
       
    }
}
