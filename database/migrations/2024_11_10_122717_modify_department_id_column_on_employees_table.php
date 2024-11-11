<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDepartmentIdOnEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
         
            $table->foreignId('department_id')->constrained('departments')->nullable(false)->change();
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            
            $table->foreignId('department_id')->constrained('departments')->nullable()->change();
        });
    }
}
