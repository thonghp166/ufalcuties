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
       			'user_name'=> 'fit',
       			'password' => bcrypt('fit123'),
       			'level'=> 1
       		],
       		[
       			'user_name'=> 'admin',
       			'password' => bcrypt('admin123'),
       			'level'=> 1
       		],
       ];
       DB::table('users')->insert($data);

    }


}
