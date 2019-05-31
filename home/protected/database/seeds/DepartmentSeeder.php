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
       			'name'=> 'Bộ môn Các hệ thống thông minh',
       			'type' => 'Bộ môn',
       			'address' => '',
       			'phone' => '0000',
       			'website' => 'fit.uet.vnu.edu.vn'
       		],
       		[
       			'name'=> 'PTN  trọng điểm Hệ thống Tích hợp Thông minh',
       			'type' => 'Phòng thí nghiệm',
       			'address' => '',
       			'phone' => '',
       			'website' => 'fit.uet.vnu.edu.vn'
       		],
       		[
       			'name'=> 'PTN Cơ kỹ thuật',
       			'type' => 'Phòng thí nghiệm',
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
	          'name'=> 'PTN Công nghệ năng lượng',
       			'type' => 'Phòng thí nghiệm',
       			'address' => '',
       			'phone' => '',
       			'website' => 'fema.uet.vnu.edu.vn'
	        ],
	        [
	          'name'=> 'Phòng thực hành Điện tử – Viễn thông',
       			'type' => 'Phòng thí nghiệm',
       			'address' => '',
       			'phone' => '',
       			'website' => 'fet.uet.vnu.edu.vn'
	        ],
       ];
       DB::table('department')->insert($data);
    }
    
}