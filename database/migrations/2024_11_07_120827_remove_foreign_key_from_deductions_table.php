<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        
        Schema::table('deductions', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
        });
    }

    public function down()
    {
        
        Schema::table('deductions', function (Blueprint $table) {
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
        });
    }
};
