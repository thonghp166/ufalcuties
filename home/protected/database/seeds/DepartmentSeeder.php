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
       			'name'=> 'Bộ môn Các Hệ thống Thông minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
       		],
       		[
       			'name'=> 'Bộ môn Các Hệ thống Thông minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
       		],
       		[
       			'name'=> 'Bộ môn Các Hệ thống Thông minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
       		],
       		[
       			'name'=> 'Bộ môn Các Hệ thống Thông minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
       		],
       		[
       			'name'=> 'Bộ môn Các Hệ thống Thông minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
       		],
	        [
	            'name'=> 'Bộ môn Các Hệ thống Thông minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
	        ],
	        [
	            'name'=> 'Bộ môn Các Hệ thống Thông minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
	        ],
       ];
       DB::table('department')->insert($data);
    }
    
}