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
       			'password' => bcrypt('admin4321'),
       			'level'=> 0
       		],
          [
            'username'=> 'fit',
            'password' => bcrypt('fit123'),
            'level'=> 1
          ],
          [
            'username'=> 'thanld',
            'password' => bcrypt('abc123'),
            'level'=> 0
          ],
       ];
       DB::table('users')->insert($data);
    }


}
