<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     // $this->call(UsersTableSeeder::class);
    // }

    public function run()
    {
       $data = [
       		[
       			'name'=> 'Lê Đình Thanh',
       			'account' => 'thanhld',
       			'staff_type' => 'Giảng viên',
       			'vnu_email' => 'thanld@vnu.edu.vn',
       			'code' => 'FIT01',
       			'work_unit' => 'FIT',
       			'phone' => '0123456789',
       			'gmail' => 'conga@gmail.com',
       			'website' => 'fb.com',
       			'address' => 'Moscow',
       			'degree' => 'TS'
       		],
       		[
       			'name'=> 'Hoàng Xuân Tùng',
       			'account' => 'tunghx',
       			'staff_type' => 'Giảng viên',
       			'vnu_email' => 'tunghx@vnu.edu.vn',
       			'code' => 'FIT02',
       			'work_unit' => 'FIT',
       			'phone' => '0123456789',
       			'gmail' => 'conga1@gmail.com',
       			'website' => 'fb2.com',
       			'address' => 'Moscow',
       			'degree' => 'TS'
       		],
       ];
       DB::table('staff')->insert($data);
    }

}
