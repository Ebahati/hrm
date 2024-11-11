<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('designations')->insert([
            [
                'name' => 'Manager',
                'department_id' => 22, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Developer',
                'department_id' => 23, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
