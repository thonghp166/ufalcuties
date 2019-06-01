<?php

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
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
          'name'=> 'Administrator',
          'account' => 'admin',
          'user_id' => 1,
          'staff_type' => 'Administrator',
          'vnu_email' => '16020286@vnu.edu.vn',
          'code' => 'THONGLT',
          'phone' => '0356859900',
          'gmail' => 'thonghp11@gmail.com',
          'website' => 'fb.com/tt166',
          'address' => 'My Dinh',
          'degree' => ''
        ],
        [
          'name'=> 'Lê Đình Thanh',
          'account' => 'thanhld',
          'user_id' => 2,
          'staff_type' => 'Giảng viên',
          'vnu_email' => 'thanld@vnu.edu.vn',
          'code' => 'FIT01',
          'phone' => '0123456789',
          'gmail' => 'thanld@gmail.com',
          'website' => 'http://uet.vnu.edu.vn/~thanhld/',
          'address' => 'Moscow',
          'degree' => 'TS'
        ],
        [
          'name'=> 'Hoàng Xuân Tùng',
          'account' => 'tunghx',
          'user_id' => 3,
          'staff_type' => 'Giảng viên',
          'vnu_email' => 'tunghx@vnu.edu.vn',
          'code' => 'FIT02',
          'phone' => '0123456789',
          'gmail' => 'tunghx@gmail.com',
          'website' => 'fb2.com',
          'address' => 'Moscow',
          'degree' => 'TS'
        ],
        [
          'name'=> 'Nguyễn Hoài Sơn',
          'account' => 'sonnh',
          'user_id' => 4,
          'staff_type' => 'Giảng viên',
          'vnu_email' => 'sonnh@vnu.edu.vn',
          'code' => 'FIT03',
          'phone' => '0123456789',
          'gmail' => 'sonnh@gmail.com',
          'website' => 'fb3.com',
          'address' => 'Moscow',
          'degree' => 'TS'
        ],
        [
          'name'=> 'Trần Trúc Mai',
          'account' => 'mai.tran',
          'user_id' => 5,
          'staff_type' => 'Giảng viên',
          'vnu_email' => 'mai.tran@vnu.edu.vn',
          'code' => 'FIT04',
          'phone' => '0123456789',
          'gmail' => 'mai.tran@gmail.com',
          'website' => 'fb4.com',
          'address' => 'Moscow',
          'degree' => 'TS'
        ],
        [
          'name'=> 'Dương Lê Minh',
          'account' => 'minhld',
          'user_id' => 6,
          'staff_type' => 'Giảng viên',
          'vnu_email' => 'minhld@vnu.edu.vn',
          'code' => 'FIT05',
          'phone' => '0123456789',
          'gmail' => 'minhld@gmail.com',
          'website' => 'fb4.com',
          'address' => 'Moscow',
          'degree' => 'TS'
        ],
        [
          'name'=> 'Hồ Đắc Phương',
          'account' => 'phuonghd',
          'user_id' => 7,
          'staff_type' => 'Giảng viên',
          'vnu_email' => 'phuonghd@vnu.edu.vn',
          'code' => 'FIT05',
          'phone' => '0123456789',
          'gmail' => 'phuonghd@gmail.com',
          'website' => 'fb3.com',
          'address' => 'Moscow',
          'degree' => 'ThS'
        ],
        [
          'name'=> 'Ngô Lê Minh',
          'account' => 'minhnl',
          'user_id' => 8,
          'staff_type' => 'Giảng viên',
          'vnu_email' => 'minhnl@vnu.edu.vn',
          'code' => 'FIT06',
          'phone' => '0123456789',
          'gmail' => 'minhnl@gmail.com',
          'website' => 'fb3.com',
          'address' => 'Moscow',
          'degree' => 'ThS'
        ],
        [
          'name'=> 'Trương Anh Hoàng',
          'account' => 'hoangta',
          'user_id' => 9,
          'staff_type' => 'Giảng viên',
          'vnu_email' => 'hoangta@vnu.edu.vn',
          'code' => 'FIT10',
          'phone' => '0123456789',
          'gmail' => 'hoangta@gmail.com',
          'website' => '',
          'address' => 'HaNoi',
          'degree' => 'ThS'
        ],
     ];
     DB::table('staff')->insert($data);
     
    }
}
