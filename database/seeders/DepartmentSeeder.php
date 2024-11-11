<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('departments')->insert([
           
            [
                'name' => 'Finance',
                'description' => 'Handles all financial matters',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IT',
                'description' => 'Manages IT infrastructure',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
