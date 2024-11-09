<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyEmployeeIdInDeductionsTable extends Migration
{
    public function up()
    {
        Schema::table('deductions', function (Blueprint $table) {
           
            $table->string('employee_id', 255)->change();
        });
    }

    public function down()
    {
        Schema::table('deductions', function (Blueprint $table) {
           
            $table->bigInteger('employee_id')->change();
        });
    }
}
