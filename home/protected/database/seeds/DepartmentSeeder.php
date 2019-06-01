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
            'website' => 'fit.uet.vnu.edu.vn'
          ],
          [
            'name'=> 'Bộ môn Các hệ thống thông tin',
            'type' => 'Bộ môn',
            'address' => 'Phòng 305 – Nhà E3 – 144 Xuân Thuỷ, Cầu Giấy, Hà Nội',
            'phone' => '024-3754-7813',
            'website' => 'fit.uet.vnu.edu.vn'
          ],
          [
            'name'=> 'PTN trọng điểm Hệ thống Tích hợp Thông minh',
            'type' => 'Phòng thí nghiệm',
            'address' => 'Phòng 314 - Nhà E4 - 144 Xuân Thuỷ, Cầu Giấy, Hà Nội',
            'phone' => '024-3754-9664',
            'website' => 'sis.uet.vnu.edu.vn'
          ],
          [
            'name'=> 'PTN trọng điểm Công nghệ micro và nano',
            'type' => 'Phòng thí nghiệm',
            'address' => 'Phòng 2.3 - Nhà E4 - 144 Xuân Thủy, Cầu Giấy, Hà Nội',
            'phone' => '024-3754-9665',
            'website' => 'vmina.uet.vnu.edu.vn'
          ],
          [
            'name'=> 'Bộ môn Hệ thống viễn thông',
            'type' => 'Bộ môn',
            'address' => 'Nhà G2- 144 Xuân Thủy, Cầu Giấy Hà Nội',
            'phone' => '024-3754-9338',
            'website' => 'fet.uet.vnu.edu.vn'
          ],
          [
            'name'=> 'Xưởng Cơ khí - Tự động hóa',
            'type' => 'Phòng thí nghiệm',
            'address' => 'Nhà E4 - 144 Xuân Thủy, Cầu Giấy, Hà Nội',
            'phone' => '024-3754-9431',
            'website' => 'fema.uet.vnu.edu.vn'
          ],
          [
            'name'=> 'Phòng thực hành Điện tử – Viễn thông',
            'type' => 'Phòng thí nghiệm',
            'address' => 'Nhà G2- 144 Xuân Thủy, Cầu Giấy Hà Nội',
            'phone' => '024-3754-9338',
            'website' => 'fet.uet.vnu.edu.vn'
          ],
       ];
       DB::table('department')->insert($data);
    }
    
}