<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
     $this->call(DepartmentSeeder::class);
     $this->call(UserTableSeeder::class);
     $this->call(StaffSeeder::class);
     $this->call(TopicSeeder::class);
     $this->call(FieldSeeder::class);
     $this->call(FieldStaffSeeder::class);

    }
}
