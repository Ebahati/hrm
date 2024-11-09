<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEmployeeIdColumnInBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('bonuses', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
        });

        
        Schema::table('bonuses', function (Blueprint $table) {
            $table->string('employee_id', 255)->change(); 
        });

       
        Schema::table('bonuses', function (Blueprint $table) {
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('bonuses', function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
        });

        
        Schema::table('bonuses', function (Blueprint $table) {
            $table->integer('employee_id')->change(); 
        });
    }
}
