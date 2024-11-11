<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        
        $employees = DB::table('employees')->get();

        foreach ($employees as $employee) {
           
            $department = DB::table('departments')->where('name', $employee->department)->first();

            if ($department) {
              
                DB::table('employees')
                    ->where('employee_id', $employee->employee_id)
                    ->update(['department_id' => $department->id]);
            }
        }
    }

    public function down()
    {
        
    }
};
