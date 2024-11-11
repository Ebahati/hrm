<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::table('employees', function (Blueprint $table) {
        $table->bigInteger('department_id')->unsigned()->nullable(); 
        $table->foreign('department_id')->references('id')->on('departments'); 
    });
}

public function down()
{
    Schema::table('employees', function (Blueprint $table) {
        $table->dropForeign(['department_id']); 
        $table->dropColumn('department_id'); 
    });
}

};
