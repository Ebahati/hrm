<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateEmployeeIdInUsersTable extends Migration
{
    public function up()
    {
        
        DB::statement('UPDATE users SET employee_id = name');

     
        Schema::table('users', function (Blueprint $table) {
           
            $table->dropColumn('name');

        
            $table->string('employee_id')->change();
            $table->foreign('employee_id')
                  ->references('employee_id')
                  ->on('employees')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        
            $table->dropForeign(['employee_id']);

        
            $table->string('name')->nullable();

         
            DB::statement('UPDATE users SET name = employee_id');

         
            $table->dropColumn('employee_id');
        });
    }
}
