<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
       			'username'=> 'admin',
            'email' => '16020286@vnu.edu.vn',
       			'password' => bcrypt('admin4321'),
       			'level'=> 1
       		],
          [
            'username'=> 'thanhld',
            'email' => 'thongletrung166@gmail.com',
            'password' => bcrypt('abc123'),
            'level'=> 0
          ],
          [
            'username'=> 'tunghx',
            'email' => 'tunghx@vnu.edu.vn',
            'password' => bcrypt('abc123'),
            'level'=> 0
          ],
          [
            'username'=> 'sonnh',
            'email' => 'sonnh@vnu.edu.vn',
            'password' => bcrypt('abc123'),
            'level'=> 0
          ],
          [
            'username'=> 'mai.tran',
            'email' => 'mai.tran@vnu.edu.vn',
            'password' => bcrypt('abc123'),
            'level'=> 0
          ],
          [
            'username'=> 'minhld',
            'email' => 'minhld@vnu.edu.vn',
            'password' => bcrypt('abc123'),
            'level'=> 0
          ],
          [
            'username'=> 'phuonghd',
            'email' => 'phuonghd@vnu.edu.vn',
            'password' => bcrypt('abc123'),
            'level'=> 0
          ],
          [
            'username'=> 'minhnl',
            'email' => 'minhnl@vnu.edu.vn',
            'password' => bcrypt('abc123'),
            'level'=> 0
          ],
          [
            'username'=> 'hoangta',
            'email' => 'hoangta@vnu.edu.vn',
            'password' => bcrypt('abc123'),
            'level'=> 0
          ],
       ];
       DB::table('users')->insert($data);
    }


}
