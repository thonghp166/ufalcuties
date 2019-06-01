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
       			'name'=> 'An ninh mạng',
       			'childOf' =>  2
       		],
          [
            'name'=> 'Tương tác người - máy',
            'childOf' =>  2
          ],
          [
            'name'=> 'Công nghệ phần mềm',
            'childOf' => 1
          ],
          [
            'name'=> 'Mạng máy tính và truyền thông dữ liệu',
            'childOf' => 1
          ],
          [
            'name'=> 'Công nghệ thông tin',
            'childOf' => 1
          ],
       		[
       			'name'=> 'Điện tử viễn thông',
            	'childOf' => 0,
       		],
	        [
	            'name'=> 'Kỹ thuật Điện tử - truyền thông',
	            'childOf' => 5,
	        ],
	        [
	            'name'=> 'Hệ thống Viễn thông',
	            'childOf' => 6,
	        ],
                    [
              'name'=> 'Kỹ thuật Máy tính',
              'childOf' => 5,
          ],
       ];
       DB::table('field')->insert($data);
       
    }
}
