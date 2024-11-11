<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\DesignationSeeder; 

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
      
      

        $this->call(EmployeeSeeder::class);
    }
}
