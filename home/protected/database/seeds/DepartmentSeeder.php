<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
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
       			'name'=> 'Không',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '',
       			'website' => ''
       		],
       		[
       			'name'=> 'Bộ môn Các Hệ thống minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
       		],
       		[
       			'name'=> 'Bộ môn bbb thống Thông',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
       		],
       		[
       			'name'=> 'Bộ môn Các Thông minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
       		],
       		[
       			'name'=> 'Bộ mônthống Thông minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
       		],
	        [
	            'name'=> 'Bộ Hệ Thông minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
	        ],
	        [
	          'name'=> 'Bộ mônthống minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
	        ],
       ];
       DB::table('department')->insert($data);
    }
    
}