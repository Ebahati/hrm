<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEmployeesTable extends Migration
{ public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
         
            $table->dropColumn('designation');

       
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
          
            $table->string('designation')->nullable();
            $table->dropForeign(['designation_id']);
        });
    }
}