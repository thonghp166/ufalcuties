<?php

use Illuminate\Database\Seeder;
use App\Staff;

class TopicSeeder extends Seeder
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
       			'name'=> 'AI',
       			'detail' => 'abc',
            'staff_id' => 1
       		],
       		[
       			'name'=> 'Machine Learning',
       			'detail' => 'abcd',
            'staff_id' => 1
       		],
       		[
       			'name'=> 'IOT',
       			'detail' => 'abcef',
            'staff_id' => 1
       		],
       		[
       			'name'=> 'Network',
       			'detail' => 'abcefgh',
            'staff_id' => 1
       		],
       		[
       			'name'=> 'Software',
       			'detail' => 'pro',
            'staff_id' => 2
       		],
       ];
       DB::table('topic')->insert($data);
       
    }
}
