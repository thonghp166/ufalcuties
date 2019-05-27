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
            'username'=> 'fit',
            'email' => 'thonghp11@gmail.com',
            'password' => bcrypt('fit123'),
            'level'=> 0
          ],
          [
            'username'=> 'thanld',
            'email' => 'thongletrung166@gmail.com',
            'password' => bcrypt('abc123'),
            'level'=> 0
          ],
       ];
       DB::table('users')->insert($data);
    }


}
